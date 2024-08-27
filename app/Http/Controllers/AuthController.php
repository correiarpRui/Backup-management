<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AuthController extends Controller
{
    public function show(){
        return view('auth.show');
    }

    public function login(){

        validator(request()->all(), [
            'email' => ['required', 'email'],
            'password' => ['required']
        ])->validate();

        if(auth()->attempt(request()->only(['email', 'password']))){
            if(auth()->user()->role === 'root'){
                return redirect(route('root.clients'));
            } else{
                return redirect(route('client.clients'));
            }
        }
        return redirect()->back()->withErrors(['email' => 'Invalid Credentials']);        
    }

    
    public function logout(){
        auth()->logout();

        return redirect('/');
    }
}
