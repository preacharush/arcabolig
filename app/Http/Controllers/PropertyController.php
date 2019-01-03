<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\address;
use App\city;
use App\country;
use App\Client;
use App\company;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      

        $properties = DB::table('clients')
                    ->join('address', 'address.id','=', 'clients.address_id')
                    ->join('company_has_clients','clients.id','=','company_has_clients.client_id')
                    ->join('company','company.id','=','company_has_clients.company_id')
                    
                    ->join('client_has_property','clients.id', '=','client_has_property.client_id')
                    ->join('properties','properties.id', '=', 'client_has_property.property_id')

                    ->leftjoin('property_has_addresses','property_has_addresses.properties_id','=','properties.id')
                    ->leftjoin('address AS prop','property_has_addresses.address_id','=', 'prop.address')
                    ->where('company.id', '=', session()->get('company_id'))
                    ->select('properties.property_unique_id','property_name','properties.id', 'address.address')
                    ->get();

                    //  dd($properties);
                    // return $properties[0];
        
        
        return view('pages/admin/property/property-overview',compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $countries = country::all();
        $cities = city::all();

        // for select options - get client data - company id = session company_id
        $clients = DB::table('clients')
        ->join('address', 'address.id','=', 'clients.address_id')
        ->join('company_has_clients','clients.id','=','company_has_clients.client_id')
        ->join('company','company.id','=','company_has_clients.company_id')
        ->where('company.id', '=', session()->get('company_id'))
        ->select('clients.client_reg_nr', 'clients.client_name','address.address', 'clients.client_contact', 'clients.client_phone1', 'clients.client_email',
                    'clients.created_at','clients.id' )
        ->get();
        
       
        return view('pages/admin/property/property-create', compact('countries', 'cities', 'clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client_id = $request->client_id;
        $property_name = $request->property_name;
        $address = $request->address;
        $address2 = $request->address2;
        $country = $request->country;
        $city = $request->city;

        // find the highest property nr and add +1 to keep the uniqueness Remember to make it as an transaktion
        $highestCompNr = DB::table('properties')->max('property_unique_id');
            $highestCompNr += 1;

        //prepare property data in one variable
        $propertyData = [
            'property_name'=> $property_name,
            'property_unique_id'=> $highestCompNr
        ];
            // Insert property data and get last ID
            $propertyId = DB::table('properties')->insertGetId( $propertyData );

        //Prepare client hast property data in one variable
        $client_has_propertyData = [
            'client_id'=> $client_id,
            'property_id'=> $propertyId
        ];
            DB::table('client_has_property')->insert( $client_has_propertyData );

        // Create address
        $addressData = [
            'address' => $address,
            'address2' => $address2,
            'city_id' => $city

        ];

            // insert  in address table and grab address ID
            $address_id = DB::table('address')->insertGetId( $addressData );

        //prepare property has address data
        $property_has_addressesData = [
            'address_id' => $address_id,
            'properties_id' => $propertyId
        ];

            DB::table('property_has_addresses')->insert( $property_has_addressesData );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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
        
        //Delete property
        DB::table('properties')
         ->where('properties.id', '=', $id)
         ->delete();

        //Dele Client property connection
         DB::table('client_has_property')
         ->where('client_has_property.property_id', '=', $id)
         ->delete();

        //Get Klient company/property details to set the new session variable
        if (session()->get('comp_info')) {

            //Clear session
            session()->forget('comp_info');

            // Get ID, property unique ID and property name   
            $properties = DB::table('clients')
            ->join('address', 'address.id','=', 'clients.address_id')
            ->join('company_has_clients','clients.id','=','company_has_clients.client_id')
            ->join('company','company.id','=','company_has_clients.company_id')
            ->join('client_has_property','clients.id', '=','client_has_property.client_id')
            ->join('properties','properties.id', '=', 'client_has_property.property_id')
            ->where('company.id', '=', session()->get('company_id'))
            ->select('properties.id','properties.property_unique_id','property_name')
            ->get();
            // dd($properties['comp_info']);            

            // set properties data in array object
            $properties = ['comp_info'=>$properties];

            // dd(session()->get('comp_info'));
            // dd(session()->get('comp_info')[0]);
            
            //Set session variables
            session($properties);
            //   dd(session());

        }


         return redirect()->route('properties.index');
    }
}
