<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){

        $users = User::all();
        return view('admin.users.index', ['users'=>$users]);
    }

    public function create(){
        return view('admin.users.create');
    }

    public function store(Request $request){

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();        

        return redirect('/admin/clients');
    }

    public function show(){
        $user = User::find(auth()->user()->id);

        return view('admin.users.show',['user'=>$user]);
    }

    public function update(){
        $user = User::find(auth()->user()->id);
        return view('admin.users.update',['user'=>$user]);
    }

    public function patch(Request $request){
        $user = User::findOrFail(auth()->user()->id);
        $user->email = $request->email;
        $user->access_key = $request->access_key;
        $user->secret_key = $request->secret_key;
        $user->save();

        return redirect('/admin/user');
    }
}
