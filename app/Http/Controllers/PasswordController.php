<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Session;
session_start();


class PasswordController extends Controller
{
    public function index(){
    	return view('auth.passwords.passwordchange'); 
    }

    public function password_update(Request $request){

    	$password = Auth::user()->password;
    	$oldpass = $request->oldpass;

    	if (Hash::check($oldpass, $password)) {
    		
    		$user = User::find(Auth::id());
	    	$user->password = Hash::make($request->password);
	    	$user->save();
	    	Auth::logout();

	    	session::put('successmsg', 'Successfully password change, now login please');
	    	return Redirect()->route('login');
	    	// return Redirect()->route('login')->with('successmsg', 'Successfully password change, now login please');
    	}else{
    		session::put('Errormsg', 'Old password does not match!!');
    		return Redirect()->back();
    		// return Redirect()->back()->with('Errormsg', 'Old password does not match!!');
    	}
    }
}
