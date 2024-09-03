<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Client;

class ClientController extends Controller
{
    public function index(){
        $clients = Client::whereHas('users', function ($query){
            return $query->where('user_id', auth()->user()->id);
        })->get();

        
        if($clients->count() > 1){
            return view('client.client.index', ['clients'=>$clients]);
        }
        return redirect()->route('client.clients.show', $clients[0]->id);
    }

    public function show($id){
        $clients = Client::whereHas('users', function ($query){
            return $query->where('user_id', auth()->user()->id);
        })->get();

        $user = Client::with('users')->find($id);

        return view('client.client.show', ['client'=>$user, 'clients'=>$clients]);
    }
}
