<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\Client;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;

class ClientController extends Controller
{
     public function index(){
        // $clients = Client::with('users')->where('user_id', '=', auth()->id())->get();
        $clients = Client::all();
        return view('admin.client.index', ['clients'=>$clients]);
    }

    public function create(){
        $users = User::where('id', '!=', auth()->id())->get();
        return view('admin.client.create', ['users'=>$users]);
    }

    public function store(StoreClientRequest $request){
        $data = [
            'name'=> $request->validated('name'), 
            'address'=>$request->validated('address'),
            'contact'=>$request->validated('contact'), 
            'email'=>$request->validated('email')
        ]; //Create DTO

        $client = new Client($data);

        $users = $request->validated('users', []);
        $users[]= auth()->id();
        $client->users()->attach($users);
        $client->save();

        return redirect()->route('admin.clients');
    }
    
    public function show($id){
        $client = Client::with(['users'=> function ($query){
            $query->where('user_id', '!=', auth()->id() ); //maybe not right
        }])->find($id);
        $users = User::all();
        return view('admin.client.show', ['client'=> $client, 'users'=>$users]);
    }
    
    public function update($id){
        $client = Client::with('users')->find($id); // tirar o user que criou (created_by)
        $users = User::all();
        return view('admin.client.update', ['client'=>$client, 'users'=>$users]);
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

        return redirect()->route('admin.clients');
    }
    

    public function destroy($id){
        $client = Client::findOrFail($id);
        $client->delete();
        return redirect()->route('admin.clients');
    }
}
