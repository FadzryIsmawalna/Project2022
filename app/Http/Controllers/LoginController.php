<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showFormLogin(){
        return view('auth.login');
    }
    
    public function authenticate(Request $request){
        
        $request->validate([
        'email' => 'required',
        'password' => 'required'
        ]);

        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')->withSuccess('Signed in');
        }
        return redirect("/")->withSuccess('Login details are not valid');
    }
    
    public function dashboard(){
		if(Auth::check()){
			return view('dashboard');
		}
		return redirect("/")->withSuccess('You are not allowed to access');
	}
    public function signOut(){
        Session::flush();
        Auth::logout();

        return redirect('/');
    }
    //
}
