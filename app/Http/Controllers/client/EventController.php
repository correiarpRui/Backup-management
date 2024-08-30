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

      // $clients = Client::withWhereHas('backups.reports', function($query) use($sort, $field){
      //   $query->orderBy($field, $sort);
      // })->find($clientId);

      $client = Client::with(['backups.reports'=>fn($query)=>$query->orderBy($field, $sort)])->find($clientId);

      // $backups = Backup::with('client')->withWhereHas('reports',  function($query) use ($sort, $field){
      //   $query->orderBy($field, $sort);
      // })->where('client_id', $clientId)->get();

      return view('client.events.index', ['client'=>$client, 'sort'=>$sort, 'field'=>$field]);
    }


}
