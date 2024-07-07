<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Client;


class EventController extends Controller
{
    public function index(){

     $data = Client::with(['user', 'backups.reports'])
         ->whereHas('user', function($q){
            $q->where('user_id', auth()->id());})
        ->get();      

      return view('client.events.index', ['data'=>$data]);
    }


}
