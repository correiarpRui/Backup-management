<?php

namespace App\Http\Controllers\root;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserKeyRequest;
use App\Http\Requests\UpdateUserRequest;
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
        $user = new User($request->validated());
        $user->save();        

        return redirect()->route('root.users');
    }

    public function show($id){
        $user = User::find($id);
        return view('root.users.show',['user'=>$user]);
    }

    public function update($id){
        $user = User::find($id);
        return view('root.users.update',['user'=>$user]);
    }

    public function updateKey($id){
        $user = User::find($id);
        return view('root.users.updateKey', ['user'=>$user]);
    }

    public function patch(UpdateUserRequest $request, $id){
        $user = User::find($id);
        $user->update($request->validated());
        
        return redirect()->route('root.users.show', $id);   
    }

    public function patchKey(UpdateUserKeyRequest $request, $id){
        $data = [
            'access_key'=>$request->validated('access_key'),
            'secret_key'=>$request->validated('secret_key')
        ];
        $user = User::find($id);
        
        $user->update($data);
        return redirect()->route('root.users.show', $id);
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('root.users');
    }
}
