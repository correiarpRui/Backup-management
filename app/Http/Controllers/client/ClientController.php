<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Client;

class ClientController extends Controller
{
    public function show($id){
        $clients = Client::whereHas('users', function ($query){
            return $query->where('user_id', auth()->user()->id);
        })->get();
        
        if($id == 0){
            $user = Client::whereHas('users', function ($query){
            return $query->where('user_id', auth()->user()->id);
            })->first();
        } else{
            $user = Client::with('users')->find($id);    
        }

        return view('client.client.show', ['client'=>$user, 'clients'=>$clients]);
    }
}
