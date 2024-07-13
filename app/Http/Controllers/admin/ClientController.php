<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
     public function index(){

        $clients = Client::with('user')->where('user_id', '=', auth()->id())->get();
        $users = User::all();

        return (view('admin.client.index', ['clients'=>$clients, 'users'=>$users]));
    }

    public function create(){
        return (view('admin.client.create'));
    }

    public function store(StoreClientRequest $request){

        $validated = $request->validated();

        $clients = new Client($validated);
        $clients->user_id = auth()->id();

        $clients->save();

        return redirect('/admin/clients');
    }

    public function addUsers( Request $request, $id){  
        $client = Client::query()
        ->where('id', '=', $id )->get();
        
        $client[0]->user()->syncWithoutDetaching($request->users);
        $client[0]->save();

        return redirect('/admin/clients');
    }

    public function destroy($id){
        $client = Client::findOrFail($id);
        $client->delete();
        return redirect('/admin/clients');
    }
}
