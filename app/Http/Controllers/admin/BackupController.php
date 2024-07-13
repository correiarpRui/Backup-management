<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBackupRequest;
use App\Models\Backup;
use App\Models\Client;
use App\Services\GenerateBackupConfig;
use Carbon\Carbon;

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
            'allowedDays' => $request->allowedDays, 
        ]);
        
        $backup->save();

        //service - Generate Backup
        (new GenerateBackupConfig)->generateBackup($backup);
        
        
        return redirect('/admin/backups');
    }

    public function download($id){
        
        $backup = Backup::findOrFail($id);
        $filepath = public_path("storage/{$backup->token}.json");
        return response()->download($filepath);

    }
}
