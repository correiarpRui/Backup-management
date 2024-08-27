<?php

namespace App\Http\Controllers\root;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBackupRequest;
use App\Http\Requests\UpdateBackupRequest;
use App\Models\Backup;
use App\Models\Client;
use App\Services\GenerateBackupConfig;
use Carbon\Carbon;

use Illuminate\Support\Str;

class BackupController extends Controller
{

    public function index(){

        $sort = request('sort', 'asc');
        $field = request('field', 'name');
        
        $backups = Backup::with('client')->orderBy($field, $sort)->get();
        return view('root.backup.index', ['backups'=>$backups, 'sort'=>$sort, 'field'=>$field]);
    }

    public function create(){
        $clients = Client::all();
        $date = date('Y-m-d'); 

        return view('root.backup.create', ['clients'=>$clients, 'date'=>$date]);
    }

    public function destroy($id){
        $backup = Backup::find($id);
        $backup->delete();
        return redirect()->route('root.backups');
    }

    public function store(StoreBackupRequest $request){

        $validated = $request->validated(); // array of validated values | custom validation

        $date = Carbon::parse($request->date . $request->time)->format('Y-m-d H:i');

        $backup = new Backup([
            'token'=>str(Str::random())->lower()->__toString(), //Str::random()->lower() not stringable
            'name'=>$request->name,
            'client_id'=> $request->client,
            'description'=>$request->description,
            'encryption'=>$request->encryption,
            'passphrase'=>$request->passphrase,
            'time'=>$date,
            'repeat'=>$request->repeat . $request->units,
            'allowedDays' => $request->allowedDays, 
        ]);
    
        $backup->save();
        //service - Generate Backup
        (new GenerateBackupConfig)->generateBackup($backup);
        return redirect()->route('root.backups');
    }

    public function download($id){
        $backup = Backup::findOrFail($id);
        $filepath = public_path("storage/{$backup->token}.json");
        return response()->download($filepath);
    }

    public function show($id){
        $sort = request('sort', 'asc');
        $field = request('field', 'name');

        $backup = Backup::with(['client', 'reports'=>function($query) use ($sort, $field) {
            $query->orderBy($field, $sort);
        }])->find($id);

        return view('root.backup.show', ['backup'=>$backup, 'sort'=>$sort, 'field'=>$field]);
    }

    public function update($id){
        $clients = Client::all();
        $date = date('Y-m-d'); 
        $backup = Backup::find($id);
        return view ('root.backup.update', ['clients'=>$clients, 'date'=>$date, 'backup'=>$backup]);
    }

    public function patch(UpdateBackupRequest $request, $id){
        $backup = Backup::find($id);
    
        $data = [
            'token'=>$backup->token,
            'name'=>$request->validated('name'),
            'client_id'=> $request->validated('client'),
            'description'=>$request->validated('description'),
            'encryption'=>$request->validated('encryption'),
            'passphrase'=>$request->validated('passphrase'),
            'time'=> Carbon::parse($request->validated('data'). $request->validated('time'))->format('Y-m-d H:i'),
            'repeat'=> ($request->validated('repeat') . $request->validated('units')),
            'allowedDays' => $request->validated('allowedDays'), 
        ]; 
        
        $backup->update($data);
        (new GenerateBackupConfig)->updateBackup($backup);

        return redirect()->route('root.backups.show', $backup->id);
    }
}
