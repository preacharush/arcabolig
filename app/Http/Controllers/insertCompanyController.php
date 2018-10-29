<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\company;
use App\address;
use App\city;
use App\country;
use DB;
use Auth;

class insertCompanyController extends Controller
{
    
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            $countries = country::all();
            $cities = city::all();

            // dd($countries);
        
            return view('pages/create-company', compact('countries','cities'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $comp_name = $request->comp_name;
        $address = $request->address;
        $address2 = $request->address2;
        $zipcode = $request->zipcode;
        $city = $request->city;
        $country = $request->country;
        $phone = $request->phone;
        $mobil = $request->mobil;
        $contactPerson = $request->contactPerson;
        $contactEmail = $request->contactEmail;
        $website = $request->website;
        $comp_reg_nr = $request->comp_reg_nr;

        // Create address
        $addressData = [
            'address' => $address,
            'address2' => $address2,
            'address2' => $address2,
            'city_id' => $city

        ];

        // Create grab address ID
        $address_id = DB::table('address')->insertGetId( $addressData );

        // Create company with address ID
        $companyData = [
            'comp_reg_nr' => $comp_reg_nr,
            'comp_name' => $comp_name,
            'phone' => $phone,
            'email' => $contactEmail,
            'address_id' => $address_id

        ];

        // grab company ID
        $companyId = DB::table('company')->insertGetId( $companyData );

        // Update user with company ID
        $userId = Auth::user()->id;

       DB::table('users')
            ->where('id', $userId )
            ->update(['company_id' => $companyId]);

            return redirect('/settings');
        
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
        //
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
