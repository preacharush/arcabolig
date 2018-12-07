<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use App\company;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //get users data - company id = session company_id
        $users = User::with('company')
                    ->where('company_id', session()->get('company_id'))
                    ->get();


        return view('pages/users-show', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages/users-create', compact(''));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Auth::id();
        
        //create request variables
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $company_id = DB::table('company')
        ->join('users','users.company_id', '=', 'company.id') // join USERS with COMPANY
        ->where('users.id', '=', $id)
        ->select('users.company_id')
        ->first(); 


        // User data in one array
        $userData = [
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'company_id'=> $company_id->company_id
        ];
        
        //User gets createt
        $createUser = user::create($userData);

        return redirect('users');
        

        
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
        $user = User::findOrfail($id);

        

        return view('pages.users-edit', compact('user'));
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
        $user = User::findOrfail($id);

        //validate form indput
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|max:150',
            'password' => 'required|min:5',
        ]);

        //create variables from the request
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;

        $company_id = DB::table('company')
        ->join('users','users.company_id', '=', 'company.id') // join USERS with COMPANY
        ->where('users.id', '=', $id)
        ->select('users.company_id')
        ->first();


        // User data in one array
        $userData = [
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'company_id'=> $company_id->company_id
        ];
        
        //  dd($userData);

        // Update Data
         $update = DB::table('users')
         ->where('users.id', '=', $user->id)
         ->update($userData);


         return redirect('users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrfail($id);

        $update = DB::table('users')
         ->where('users.id', '=', $user->id)
         ->delete();

         return redirect('users');

    }
}
