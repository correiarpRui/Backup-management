<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Backup;
use App\Models\Report;
use App\Models\Client;
use Faker\Guesser\Name;

class EventController extends Controller
{
    public function index(){

      //  $data= Report::with(['client', 'user'])
      //   ->whereHas('user', function($q){
      //       $q->where('user_id', auth()->id());})
      //   ->get();

     $data = Client::with(['user', 'backups.reports'])
         ->whereHas('user', function($q){
            $q->where('user_id', auth()->id());})
        ->get();

      


      return view('client.events.index', ['data'=>$data]);
    }


}
