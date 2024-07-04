<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Backup;

class EventController extends Controller
{
    public function index(){

    $data = Backup::with('reports')->where('user_id', '=', auth()->user()->id)->get();

        return view('admin.events.index', ['data'=>$data]);
    }
}
