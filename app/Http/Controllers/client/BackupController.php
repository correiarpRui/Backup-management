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

        $client=Client::find($clientId);

        $clients = Client::whereHas('users', function ($query){
            return $query->where('user_id', auth()->user()->id);
        })->get();

        return view('client.backup.index', ['backups'=>$backups, 'sort'=>$sort, 'field'=>$field, 'client'=>$client, 'clients'=>$clients]);
    }

    public function show($clientId, $id){

        $clients = Client::whereHas('users', function ($query){
            return $query->where('user_id', auth()->user()->id);
        })->get();

        $client=Client::find($clientId); 

        $sort = request('sort', 'asc');
        $field = request('field', 'name');

        $backup = Backup::with(['client', 'reports'=>function($query) use ($sort, $field) {
            $query->orderBy($field, $sort);
        }])->find($id);

        return view('client.backup.show', ['backup'=>$backup, 'sort'=>$sort, 'field'=>$field, 'clients'=>$clients, 'client'=>$client]);
    }

    public function download($id){
        $backup = Backup::findOrFail($id);
        $filepath = public_path("storage/{$backup->token}.json");
        return response()->download($filepath);
    }

    
}
