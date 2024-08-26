<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Backup;
use App\Models\Client;


class BackupController extends Controller
{
    public function index(){

        
        $backups= Client::all();

        return view('client.backup.index', ['backups'=>$backups]);
    }

    public function download($id){
        
        $backup = Backup::findOrFail($id);
        $filepath = public_path("storage/{$backup->token}.json");
        return response()->download($filepath);

    }
}
