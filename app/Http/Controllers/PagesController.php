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
    
    public function userdashboard(Request $request)
    {
        


        //   dd(session());
        //tjekk iff company id is null (new users only)
        if ((Auth::user()->company_id) == null) {
            
            //if company id null redirect to create company
            return redirect()->route('create-company');
        }

       
        //Check if User company is set - Get compoany ID to set the session variable
        if (!session()->get('company_id')) {
           
            $companyId = DB::table('company')
            ->join('users','users.company_id', '=', 'company.id') // join USERS with COMPANY
            ->where('users.id', '=', Auth::id())
            ->select('company_id', 'comp_name')
            ->first();

            

            //set Company id as session variable
             session(['company_id' => $companyId->company_id, 'comp_name'=>$companyId->comp_name]);

    
        }
        //Get Klient company/property details to set the session variable
        if (!session()->get('comp_info')) {
           
            $properties = DB::table('clients')
            ->join('address', 'address.id','=', 'clients.address_id')
            ->join('company_has_clients','clients.id','=','company_has_clients.client_id')
            ->join('company','company.id','=','company_has_clients.company_id')
            ->join('client_has_property','clients.id', '=','client_has_property.client_id')
            ->join('properties','properties.id', '=', 'client_has_property.property_id')
            ->where('company.id', '=', session()->get('company_id'))
            ->select('properties.id','properties.property_unique_id','property_name')
            ->get();            

            // set properties data in array object
            $properties = ['comp_info'=>$properties];
            // dd($properties['comp_info']);
            // dd(session()->get('comp_info'));
            // dd(session()->get('comp_info')[0]);
            
            //Set session variables
            session($properties);
            //   dd(session());
    
        }
            
            
       

         return view('pages/user-dashboard',compact('companyId','comp_data'));

        // stdClass Object ( [id] => 1 [property_unique_id] => 42414988 [property_name] => Keeling, Bauch and Larson ) 

        // foreach ($comp_data as $keys){

        //     echo $keys->property_name;       
        //     // print_r($keys);
        //     echo"<br>";
        // }  
           

      
    }

    public function setActievProperty(Request $request, $id, $property_name)
    {

        

        // Check IF session Active_property is set
        if (!session()->get('active_property')) {
                // Set Session Active company
                session(['active_property' =>[
                    'id'=> $id,
                    'comp_name'=> $property_name
                    ]]);
        }

        if (session()->get('active_property')) {
           
            //delete old active property from session
            session()->forget('active_property');
            //set new active_property value
            session(['active_property' =>[
                        'id'=> $id,
                        'comp_name'=> $property_name
                        ]]);
        }

        // dd(session('active_property')['comp_name']);

       return redirect()->route('user.dashboard');
    }
    
    
}
