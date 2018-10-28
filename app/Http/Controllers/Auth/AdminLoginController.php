<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{


    public function __construct() {
        $this->middleware('guest:admin', ['except'=>['logout']]);
    }
    //
    public function showLoginForm() {
        return view('auth.admin-login');
    }

    public function login(Request $request) 
    {
        // validate the form data
        $this->validate($request, [
            'email'=> 'required|email',
            'password'=> 'required|min:6'
        ]);

        // attemt login
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // iff sucesfull
            return redirect()->intended(route('admin.dashboard'));
        }  

        // iff NOT sucesfull
        return redirect()->back()->withInput($request->only('email','remember'));
        
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }

}
