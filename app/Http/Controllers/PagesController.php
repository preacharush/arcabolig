<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\company;
use App\User;
use DB;
use Auth;

class PagesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('guest:admin');
    }
    
    public function userdashboard()
    {
        
        //tjekk iff company id is null (new users only)
        if ((Auth::user()->company_id) == null) {
            
            //if company id null redirect to create company
            return redirect('create-company');
        }

       
        //Get compoany ID to set the session variable
        if (!session()->get('company_id')) {
           
            $companyId = DB::table('company')
            ->join('users','users.company_id', '=', 'company.id') // join USERS with COMPANY
            ->where('users.id', '=', Auth::id())
            ->select('company_id')
            ->first()->company_id;

            //set Company id as session variable
             session(['company_id' => $companyId]);

        }
        
        
        // dd(session()->get('company_id'));

        return view('pages/user-dashboard');
    }

    
    
}
