<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use DB;
use App\address;
use App\city;
use App\country;

class ClientController extends Controller
{
    
    public function index(Request $request)
    {
        // dd(session()->get('company_id'));
        
        //get client data - company id = session company_id
        $clients = DB::table('clients')
                    ->join('address', 'address.id','=', 'clients.address_id')
                    ->join('company_has_clients','clients.id','=','company_has_clients.client_id')
                    ->join('company','company.id','=','company_has_clients.company_id')
                    ->where('company.id', '=', session()->get('company_id'))
                    ->select('clients.client_reg_nr', 'clients.client_name','address.address', 'clients.client_contact', 'clients.client_phone1', 'clients.email',
                                'clients.created_at','clients.id' )
                    ->get();

            // dd($clients);

        return view('pages/clients/clients-show',compact('clients'));
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {

        $countries = country::all();
        $cities = city::all();
        $clients = Client::findOrfail($id);

        return view('pages/clients/clients-edit',compact('clients','cities','countries'));
    }

    
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        $clients = Client::findOrfail($id);

        $update = DB::table('clients')
         ->where('clients.id', '=', $clients->id)
         ->delete();

         return redirect('client');
    }
}
