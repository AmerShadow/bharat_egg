<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Validation\ValidationException;
use App\Admin;

class AdminLoginController extends Controller
{
    //
     public function __construct()
	{
		$this->middleware('guest:admin');
	}
	public function showLogin(){
		return view('admin.login');
	}
	public function login(Request $request){
		$this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);
		
		if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
        // if successful, then redirect to their intended location
        return redirect()->intended(route('admin.home'));
      }
      else{
      	 if ( ! Admin::where('email', $request->email)->first() ) {
            return redirect()->back()
                ->withInput($request->only('email', 'remember'))
                ->withErrors([
                   'email' => Lang::get('Email Not registered.'),
                ]);
        }

        if ( ! Admin::where('email', $request->email)->where('password', bcrypt($request->password))->first() ) {
            return redirect()->back()
                ->withInput($request->only('email', 'remember'))
                ->withErrors([
                    'password' => Lang::get('Invalid password'),
                ]);
        }
      
      }
      // if unsuccessful, then redirect back to the login with the form data
     
        
    }
   
	
}
