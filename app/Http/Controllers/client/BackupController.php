<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Backup;
use App\Models\Client;
use App\Models\Report;
use App\Services\SendEmail;
use Illuminate\Http\Request;

class BackupController extends Controller
{
    public function index($clientId){
        $sort = request('sort', 'asc');
        $field = request('field', 'name');

        $backups = Backup::where('client_id', $clientId)->orderBy($field, $sort)->get();

        $client=Client::find($clientId);

        return view('client.backup.index', ['backups'=>$backups, 'sort'=>$sort, 'field'=>$field, 'client'=>$client]);
    }

    public function show($clientId, $id){

        $client=Client::find($clientId); 

        $sort = request('sort', 'asc');
        $field = request('field', 'name');

        $backup = Backup::with(['client', 'reports'=>function($query) use ($sort, $field) {
            $query->orderBy($field, $sort);
        }])->find($id);

        return view('client.backup.show', ['backup'=>$backup, 'sort'=>$sort, 'field'=>$field, 'client'=>$client]);
    }

    public function restore($clientId, $backupId){

        $client = Client::find($clientId);

        $backup = Backup::with('reports')->find($backupId);
        return view('client.backup.restore', ['backup'=>$backup, 'client'=>$client]);
    }

    public function filter($clientId, $backupId, Request $request){

        $client = Client::find($clientId);    

        $backup = Backup::with(['reports'=>function ($query) use ($request){
            $query->whereDate('begin_time', '>=', $request->startDate)
                ->whereDate('end_time', '<=', $request->endDate)
                ->get();
        }])->find($backupId);
        return view('client.backup.restore', ['backup'=>$backup, 'client'=>$client]);
    }

    public function email($id){

        $event = Report::find($id);

        $data=['name'=>auth()->user()->name, 'email'=>auth()->user()->email, 'eventId'=> $event->id];

        (new SendEmail)->createEmail($data);

        return redirect()->back();
    }
    
}
