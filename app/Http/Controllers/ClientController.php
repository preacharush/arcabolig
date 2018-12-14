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
                    ->select('clients.client_reg_nr', 'clients.client_name','address.address', 'clients.client_contact', 'clients.client_phone1', 'clients.client_email',
                                'clients.created_at','clients.id' )
                    ->get();

            // dd($clients);

        return view('pages/clients/clients-show',compact('clients'));
    }

    
    public function create()
    {
        //
        $countries = country::all();
        $cities = city::all();

        return view('pages/clients/clients-create', compact('countries', 'cities'));
         
    }

   
    public function store(Request $request)
    {
        //
        // grap post and create variables

        $client_reg_nr = $request->client_reg_nr;
        $client_name = $request->client_name;
        $address = $request->address;
        $country = $request->country;
        $city = $request->city;
        $client_contact = $request->client_contact;
        $client_email = $request->client_email;
        $client_phone1 = $request->client_phone1;
        $mobil = $request->mobil;
        $website = $request->website;
        $client_phone1 = $request->client_phone1;

        // Create address
        $addressData = [
            'address' => $address,
            'city_id' => $city

        ];

        // insert  in address table and grab address ID
        $address_id = DB::table('address')->insertGetId( $addressData );

        // create client 
        $clientData = [
            'client_reg_nr'=> $client_reg_nr,
            'client_name'=> $client_name,
            'client_contact'=> $client_contact,
            'client_phone1'=> $client_phone1,
            'client_email'=> $client_email,
            'address_id'=> $address_id
            
        ];

        // insert in client table and grab client ID

        $clientId = DB::table('clients')->insertGetId( $clientData );

        //insert client ID into company table

        $companyClientId =[
        'client_id'=> $clientId,
        'company_id'=> session()->get('company_id')
        ];

        DB::table('company_has_clients')->insertGetId( $companyClientId );

        // Redirect to Settings to view the information
        return redirect()->route('client.index');

        
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
        $address = DB::table('address')
        ->where('address.id', '=', $clients->address_id)
        ->select('address')
        ->first();

        //   dd($address);

        return view('pages/clients/clients-edit',compact('clients','cities','countries','address'));
    }

    
    public function update(Request $request, $id)
    {
        // dd($request->request);

        $client = Client::findOrfail($id);

        //validate form indput
        $request->validate([
            'client_reg_nr' => 'required',
            'client_name' => 'required',
            'client_contact' => 'required',
            'address' => 'required',
        ]);

        //create variables from the request
        $client_reg_nr = $request->client_reg_nr;
        $client_name = $request->client_name;
        $address = $request->address;
        $country = $request->country;
        $city = $request->city;
        $client_contact = $request->client_contact;
        $client_email = $request->client_email;

        // client data in one array
        $clientData = [
            'client_reg_nr'=> $client_reg_nr,
            'client_name'=> $client_name,
            'client_contact'=> $client_contact,
            'client_email'=> $client_email,
        ];

        $addressData = [
            'address'=> $address
        ];

        // Update Client table
        $updateClient = DB::table('clients')
        ->where('clients.id', '=', $id)
        ->update($clientData);

        // Update address table
        $updateAddress = DB::table('address')
        ->where('address.id', '=', $client->address_id)
        ->update($addressData);


        return redirect()->route('client.index');
    }

   
    public function destroy($id, Request $request)
    {
        $clients = Client::findOrfail($id);
        

        DB::table('address')
        ->where('address.id', '=', $clients->address_id)
        ->delete();

        DB::table('company_has_clients')
        ->where('company_has_clients.client_id', '=', $clients->id)
        ->delete();

        DB::table('clients')
        ->where('clients.id', '=', $clients->id)
        ->delete();

         return redirect()->route('client.index');
    }
}
