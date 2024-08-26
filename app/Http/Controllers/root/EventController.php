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
    $events = Report::all();
    // $events = Backup::with('reports')->orderBy($field, $sort)->get();
    
        return view('root.events.index', ['events'=>$events, 'sort'=>$sort, 'field'=>$field]);
    }
}
