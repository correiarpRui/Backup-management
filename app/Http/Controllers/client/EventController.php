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

      return view('client.events.index', ['client'=>$client, 'sort'=>$sort, 'field'=>$field]);
    }


}
