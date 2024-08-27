<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Backup;
use App\Models\Client;

class BackupController extends Controller
{
    public function index($clientId){
        $sort = request('sort', 'asc');
        $field = request('field', 'name');

        $backups = Backup::where('client_id', $clientId)->orderBy($field, $sort)->get();

        $client=Client::find($clientId); //diferent way?

        return view('client.backup.index', ['backups'=>$backups, 'sort'=>$sort, 'field'=>$field, 'client'=>$client]);
    }

    public function show($clientId, $id){

        $client=Client::find($clientId); //diferent way?

        $sort = request('sort', 'asc');
        $field = request('field', 'name');

        $backup = Backup::with(['client', 'reports'=>function($query) use ($sort, $field) {
            $query->orderBy($field, $sort);
        }])->find($id);

        return view('client.backup.show', ['backup'=>$backup, 'sort'=>$sort, 'field'=>$field, 'client'=>$client]);
    }

    public function download($id){
        $backup = Backup::findOrFail($id);
        $filepath = public_path("storage/{$backup->token}.json");
        return response()->download($filepath);
    }

    
}
