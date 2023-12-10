<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $data = User::findOrFail($id);

        return view('ProfileUser/Profile' , compact('data') );
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
        $data = User::findOrFail($id);

        return view('ProfileUser/Profile' , compact('data') );
            
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::id() == $id )
        {
            $data = User::findOrFail($id);

            return view('ProfileUser/edit', compact('data'));
            
        }else{
            return view('404');
        }

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
        $requestData = $request->all();

        return redirect('profile')->with('flash_message', 'profile updated!');
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

    function add_account(){
        return view('admin.add_account');
    }

    function create_user(Request $request)
    {
        $requestData = $request->all();
        $data_arr = [];
        
        foreach ($requestData as $item) {
            foreach ($item as $key => $value) {

                if($key == "password"){
                    $data_arr['password'] = Hash::make($value);
                }else{
                    $data_arr[$key] = $value;
                }
            }

            User::create($data_arr);
        }

        return "success" ;

    }

    function account_all(){
        return view('admin.account_all');
    }

    function get_data_account($type_get_data){

        if($type_get_data == "all"){
            $data = User::where('role' , "Member")
                ->orWhere('role' , "Challenger")
                ->get();
        }

        return $data;

    }

}
