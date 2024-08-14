<?php

namespace App\Http\Controllers\root;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $sort = request('sort', 'asc');
        $field = request('field', 'name');
        
        $users = User::orderBy($field, $sort)->get();
        return view('root.users.index', ['users'=>$users, 'sort'=>$sort, 'field'=>$field]);
        
    }

    public function create(){
        return view('root.users.create');
    }

    public function store(StoreUserRequest $request){
        // $validated = $request->validated();              can ???
        $user = new User($request->validated());
        $user->save();        

        return redirect()->route('root.users');
    }

    public function show($id){
        $user = User::find($id);
        return view('root.users.show',['user'=>$user]);
    }

    public function update(){
        $user = User::find(auth()->user()->id);
        return view('root.users.update',['user'=>$user]);
    }

    public function patch(Request $request){
        $user = User::findOrFail(auth()->user()->id);
        $user->email = $request->email;
        $user->access_key = $request->access_key;
        $user->secret_key = $request->secret_key;
        $user->save();

        return redirect('/root/user');
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('root.users');
    }
}
