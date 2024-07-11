<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBackupRequest;
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
        $backups = Backup::where('user_id', '=', auth()->user()->id)->get();
        return view('admin.backup.index', ['backups'=>$backups]);
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

    public function store(StoreBackupRequest $request){

        $validated = $request->validated(); // array of validated values | custom validation

        $date = Carbon::parse($request->date . $request->time)->format('Y-m-d H:i');

        $backup = new Backup([
            'user_id'=>auth()->user()->id,
            'token'=>Str::random(16),
            'name'=>$request->name,
            'client_id'=> $request->client,
            'description'=>$request->description,
            'encryption'=>$request->encryption,
            'passphrase'=>$request->passphrase,
            'time'=>$date,
            'repeat'=>$request->repeat . $request->units,
            'allowdDays' => $request->allowedDays, // fix allowedDays
        ]);
        
        
        $backup->save();
        return redirect('/admin/backups');
    }

    // service
    //automatico em save
    // link download do ficheiro 
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
