<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){

        $users = User::all();
        return view('client.users.index', ['users'=>$users]);
    }

    public function show(){
        $user = User::find(auth()->user()->id);

        return view('client.users.show',['user'=>$user]);
    }

    public function update(){
        $user = User::find(auth()->user()->id);
        return view('client.users.update',['user'=>$user]);
    }

    public function patch(Request $request){
        $user = User::findOrFail(auth()->user()->id);
        $user->email = $request->email;
        $user->access_key = $request->access_key;
        $user->secret_key = $request->secret_key;
        $user->save();

        return redirect('/client/user');
    }
}
