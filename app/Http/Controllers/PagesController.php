<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('guest:admin');
    }
    
    public function userdashboard()
    {

        return view('pages/user-dashboard');
    }

    // public function comp_settings()
    // {  
    //     // $settings = settings::all();
    //     return view('pages/settings', ['settings' => $settings]);
    // }
    
    
}
