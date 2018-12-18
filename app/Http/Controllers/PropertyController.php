<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

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
                    ->where('company.id', '=', session()->get('company_id'))
                    ->select('properties.property_unique_id','property_name')
                    ->get();
        
        // dd($properties);

        
        
        return view('pages/property/property-overview',compact('properties'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
