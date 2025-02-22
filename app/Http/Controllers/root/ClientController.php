<?php

namespace App\Http\Controllers\root;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use App\Models\User;
use App\Models\Backup;

class ClientController extends Controller
{
     public function index(){
        $sort = request('sort', 'asc');
        $field = request('field', 'name');
        
        $clients = Client::orderBy($field, $sort)->get();
        return view('root.client.index', ['clients'=>$clients, 'sort'=>$sort, 'field'=>$field]);
    }

    public function create(){
        $users = User::WithoutAuthUser()->get();
        return view('root.client.create', ['users'=>$users]);
    }

    public function store(StoreClientRequest $request){
        $data = [
            'name'=> $request->validated('name'), 
            'address'=>$request->validated('address'),
            'contact'=>$request->validated('contact'), 
            'email'=>$request->validated('email'),
        ]; //Create DTO

        $client = new Client($data);
        $client->save();

        $users = $request->validated('users', []);
        $users[] = auth()->id();
        $client->users()->attach($users);
        
        $client->save();

        return redirect()->route('root.clients');
    }
    
    public function show($id){
        $sort = request('sort', 'asc');
        $field = request('field', 'name');

        $backups = Backup::where('client_id', $id)->orderBy($field, $sort)->get();

        $client = Client::with('users')->find($id);
        return view('root.client.show', ['client'=> $client, 'backups'=>$backups, 'sort'=>$sort, 'field'=>$field]);
    }
    
    public function update($id){
        $client = Client::with('users')->find($id);
        $users = User::all();
        return view('root.client.update', ['client'=>$client, 'users'=>$users]);
    }

    public function patch(UpdateClientRequest $request, $id){
        $data = [
            'name'=> $request->validated('name'), 
            'address'=>$request->validated('address'),
            'contact'=>$request->validated('contact'), 
            'email'=>$request->validated('email')
        ]; //Create DTO

        $client = Client::find($id);
        $client->update($data);
        
        $users = $request->validated('users', []);
        $users[]= $client->created_by;
        $client->users()->sync($users);
        $client->save();

        return redirect()->route('root.clients');
    }
    
    public function destroy($id){
        $client = Client::find($id);
        $client->delete();
        return redirect()->route('root.clients'); 
    }
}
