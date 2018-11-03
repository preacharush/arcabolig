<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\company;
use App\address;
use App\city;
use App\country;
use DB;
use Auth;

class settingsController extends Controller
{
  
    public function __construct()
    {
        $this->middleware('guest:admin');
    }
  
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //   $company = address::all();
        //   return $company;
        //   dd($request->session()->all());
        //   $request->session()->put('user', 'Preacher');
        // dd(Auth::user()->company_id);

        $countries = country::all();
        $cities = city::all();
        
        $id = Auth::id();
        
        

        $data = DB::table('address')
            ->join('company','company.address_id','=','address.id') //join COMPANY with ADDRESS
            ->join('city', 'address.city_id', '=', 'city.id') //join ADDRESS with CITY
            ->join('country','city.country_id','=','country.id') //join CITY with COUNTRY
            ->join('users','users.company_id', '=', 'company.id') // join USERS with COMPANY
            ->where('users.id', '=', $id)
            ->select('company.Comp_reg_nr','company.comp_name','company.email', 'company.phone',
                    'address.address','address.address2','address.district',
                    'city.city','city.zipcode',
                    'country.country','country_id',
                    'users.name', 'users.email as user_mail','users.id')
            ->first(); 
            //if get() is used ,one gets an collection which have to selected based on index or iterate throug it to get properties
            // if first() is used, one gets an element, where one can point directly to the property

            //  return $data;
                // dd($data);
        
            
         return view('pages/settings', compact('data','cities', 'countries'));
        
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // THIS WORKS--->

        // $ins = DB::insert('insert into company (comp_reg_nr, comp_name, address_id) 
        //                 values (?, ?, ?)
        //                 on duplicate key update 
        //                 comp_name = values(comp_name),
        //                 address_id = values(address_id)'
        //                 , ['123456','beast', 2]
        //                 );

        // dd($ins);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

        
        // company::create(request(['comp_name', 'address']));

        // DB::table('address')->insert(
        //     ['email' => 'john@example.com', 'votes' => 0]
        // );

        $ins = DB::insert('insert into company (comp_name) values (?)', [$request->indput('comp_name')]);

        dd($ins);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //create variables from the request
        $comp_name = $request->comp_name;
        $address = $request->address;
        $address2 = $request->address2;
        $zipcode = $request->zipcode;
        $cityId = $request->city;
        $countryId = $request->country;
        $phone = $request->phone;
        $mobil = $request->mobil;
        $contactPerson = $request->contactPerson;
        $contactEmail = $request->contactEmail;
        $website = $request->website;
        $comp_reg_nr = $request->comp_reg_nr;


        //validate

    
        

        //Update statement
        //this works perfectly
        $update = DB::table('address')
            ->join('company','company.address_id','=','address.id') //join COMPANY with ADDRESS
            ->join('city', 'address.city_id', '=', 'city.id') //join ADDRESS with CITY
            ->join('country','city.country_id','=','country.id') //join CITY with COUNTRY
            ->join('users','users.company_id', '=', 'company.id') // join USERS with COMPANY
            ->where('users.id', '=', $id)
            ->update(['company.comp_name'=> $comp_name, 'address.address' => $address,'address.address2' =>$address2,
                    'company.Comp_reg_nr'=> $comp_reg_nr, 'address.city_id'=>$cityId]);
            

            //  dd($request->all());


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
