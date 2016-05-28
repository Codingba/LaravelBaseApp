<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function login(){
        if(Auth::guest()){
            return view('auth.login');
        }else{
            return redirect('/');
        }
    }

    public function postLogin(Request $request){

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if( Auth::attempt($this->getCredentials($request)) ) {
            session()->flash('message', 'You are logged in.');
            return redirect()->intended('/');
        }

        session()->flash('message', 'Something went wrong. Check your credentials and try again.');

        return redirect()->back();

    }

    public function logout(){

        Auth::logout();

        session()->flash('message', 'You are logged out. We wish a great rest of the day.');

        return redirect('/');
    }

    public function getCredentials(Request $request){

        return [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'verified' => true,
        ];

    }
}
