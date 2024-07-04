<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Aws\S3\S3Client;
use App\Models\User;
use App\Models\Backup;
use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BackupController extends Controller
{
    public function index(){

        $backups = Backup::with(['client' => function ($query){
           $query;
        }])->get();

        $test = Client::with('backups')->with(['user'=>function ($query){
            $query->where('client_user.user_id','=', 2);
        }])->get();

        $test2 = User::with(['clients'=>function ($query){
            $query->where('clients_id','=', 2);
        }])->get();

        dd($test2);
        
        // $backups = Backup::where('user_id', '=', auth()->user()->id)->get();
        return view('client.backup.index', ['backups'=>$backups]);
    }

    public function create(){

        $clients = Client::where('user_id', '=', auth()->user()->id)->get();
        $date = date('Y-m-d'); 

        return view('admin.backup.create', ['clients'=>$clients, 'date'=>$date]);
    }

    public function destroy($id){
        $backup = Backup::find($id);
        $backup->delete();
        return redirect('/admin/backups');
    }

    public function store(Request $request){
        $backup = new Backup();
        $backup->user_id = auth()->user()->id;
        $backup->token = Str::random(16);
        $backup->name = $request->name;
        $backup->client_id = $request->client;
        $backup->description = $request->description;
        $backup->encryption = $request->encryption;
        $backup->passphrase = $request->passphrase;
        
        $date = Carbon::parse($request->date . $request->time)->format('Y-m-d H:i');
        $backup->time = $date;
         
        $backup->repeat = $request->repeat . $request->units;

        $allowedDays = array($request->monday, $request->tuesday, $request->wednesday, $request->thursday, $request->friday, $request->saturday, $request->sunday);

        $backup->allowdDays = array_values(array_filter($allowedDays, function ($element){
            return $element !== null;
        }));
        
        $backup->save();
        return (redirect('/admin/backups'));
    }

    public function generate($id){

        $user = User::find(auth()->user()->id);
        $backup = Backup::find($id);

        $bucket = strtolower(str_replace(' ', '', $backup->name));

        $data = [
            "Schedule"=> [
                'Time'=>$backup->time,
                'Repeat'=>$backup->repeat,
                'AllowedDays'=>$backup->allowdDays,
            ],
            "Backup"=>[
                'Name'=>$backup->name,
                'Description'=>$backup->description,
                'TargetURL'=> "s3://{$bucket}/?s3-server-name=minio%3A9000&s3-location-constraint=&s3-storage-class=&s3-client=aws&auth-username={$user->access_key}&auth-password={$user->secret_key}",
                'Settings'=>[
                    ['Name'=>'encryption-module',
                        "Value"=> $backup->encryption
                    ],
                    ['Name'=>'dblock-size',
                        "Value"=>"50mb"
                    ],
                    ['Name'=>'passphrase',
                        "Value"=> $backup->passphrase
                    ],
                    ['Name'=>'--send-http-url',
                        "Value"=> "http://host.docker.internal:8000/api/data/{$backup->token}/{$backup->id}"
                    ],
                    ['Name'=>'--send-http-result-output-format',
                        "Value"=> 'Json'
                    ]
                ]
            ]
        ];

        $s3client = new S3Client([
            'version' => '2006-03-01',
            'region' => 'us-east-1',
            'use_path_style_endpoint' => true,
            'endpoint'=>'http://localhost:9000',
            'credentials'=> [
                'key'=> $user->access_key,
                'secret'=> $user->secret_key,
            ]
        ]);
       
        $s3client->createBucket(['Bucket'=>$bucket]);
        
        config(['filesystems.disks.s3.key' => $user->access_key]);
        config(['filesystems.disks.s3.secret' => $user->secret_key]);
       
        Storage::disk('public')->put("backup.json", json_encode($data));
        Storage::disk('s3')->put("backup{$backup->name}.json", json_encode($data));
        
        return redirect('/admin/backups');
    }
}
