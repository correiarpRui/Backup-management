<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Backup;

class EventController extends Controller
{
    public function index($clientId){

      $sort = request('sort', 'asc');
      $field = request('field', 'name');

      $client = Client::with(['backups.reports'=>fn($query)=>$query->orderBy($field, $sort)])->find($clientId);

      $clients = Client::whereHas('users', function ($query){
            return $query->where('user_id', auth()->user()->id);
        })->get();

      return view('client.events.index', ['clients'=>$clients, 'client'=>$client, 'sort'=>$sort, 'field'=>$field]);
    }


}
