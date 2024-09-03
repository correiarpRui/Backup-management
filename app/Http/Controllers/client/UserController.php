<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Client;

class UserController extends Controller
{
    public function index($clientId){
        $sort = request('sort', 'asc');
        $field = request('field', 'name');
        $client=Client::with(['users'=> fn ($query)=> $query->where([['role', '!=' , 'root'], ['user_id', '!=', auth()->user()->id]])->orderBy($field, $sort)])->find($clientId);

        $clients = Client::whereHas('users', function ($query){
            return $query->where('user_id', auth()->user()->id);
        })->get();
        return view('client.users.index', ['clients'=>$clients, 'client'=>$client, 'sort'=>$sort, 'field'=>$field]);
    }

    public function show(){
        $user = User::find(auth()->user()->id);

        return view('client.users.show',['user'=>$user]);
    }

    public function create($clientId){
        $client = Client::find($clientId);
        $clients = Client::whereHas('users', function ($query){
            return $query->where('user_id', auth()->user()->id);
        })->get();
        return view('client.users.create', ['client'=>$client, 'clients'=>$clients]);
    }

    public function store(StoreUserRequest $request, $clientId){ 
        $user = new User($request->validated());
        $user->save();        

        $client = Client::find($clientId);
        $client->users()->syncWithoutDetaching($user);
        $client->save();

        return redirect()->route('client.users', $clientId);
    }

    public function destroy($clientId,$userId){
        $user = User::find($userId);
        $user->delete();
        return redirect()->route('client.users', $clientId);
    }
}
