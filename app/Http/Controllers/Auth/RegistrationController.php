<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mailers\AppMailer;
use App\Role;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function register(){
        if(Auth::guest()){
            return view('auth.register');
        }else{
            return redirect('/');
        }
    }

    public function postRegister(Request $request, AppMailer $mailer) {
        // validate user input - request
        $this->validate($request, [
            'name' => 'required|max:15',
            'email' => 'required|email|max:60|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        // create user
        $user = User::create($request->all());

        $role = Role::where('name', '=', 'user')->firstOrFail();

        $user->roles()->attach($role->id);

        // email them a confirmation link
        $mailer->sendEmailConfirmationTo($user);

        // flash message
        session()->flash('message', 'We have sent you and email with an account confirmation link. Also check your junk/spam email folder.');

        return redirect()->back();

    }

    public function confirmEmail($emailtoken) {

        $user = User::whereEmailtoken($emailtoken)->first();

        if($user == null) {
            session()->flash('message', 'There was something wrong with the token. Try logging in.');
            return redirect('login');
        }else{
            $user->confirmEmail();
            session()->flash('message', 'You are successfully verified. Login to your account.');
            return redirect('login');
        }
    }
}
