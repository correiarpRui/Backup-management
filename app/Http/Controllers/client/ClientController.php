<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;

class ClientController extends Controller
{
    public function index(){
        $sort = request('sort', 'asc');
        $field = request('field', 'name');

        $user = User::with('clients')->where('id', auth()->user()->id)->get();
        

        dd($user);
        // $backups = Backup::where('client_id', auth()->user()->id)->orderBy($field, $sort)->get();

        // $client = Client::with('users')->find(auth()->user()->id);
        return view('client.client.index', ['client'=> $client, 'backups'=>$backups, 'sort'=>$sort, 'field'=>$field]);
    }
}


//  $backup = Backup::with(['client', 'reports'=>function($query) use ($sort, $field) {
//             $query->orderBy($field, $sort);
//         }])->find($id);