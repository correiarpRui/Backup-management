<?php

namespace App\Http\Controllers\root;

use App\Http\Controllers\Controller;
use App\Models\Backup;
use App\Models\Report;

class EventController extends Controller
{
    public function index(){
        $sort = request('sort', 'asc');
        $field = request('field', 'name');
        $events = Report::orderBy($field, $sort)->get();
        return view('root.events.index', ['events'=>$events, 'sort'=>$sort, 'field'=>$field]);
    }

    public function show($id){
        $event = Report::find($id); 
        $log = json_encode(json_decode($event->log), JSON_PRETTY_PRINT);
        return view('root.events.show', ['log'=>$log, 'event'=>$event]);
    }
}
