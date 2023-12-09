<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Register_car;
use App\Models\Organization;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use App\Models\Sos_map;
use App\Models\Guest;
use App\Models\Cancel_Profile;
use App\Models\Name_University;
use App\Http\Controllers\API\LineApiController;

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

        $organization = "";
        if (!empty($data['organization'])) {
            $organization = Organization::where('juristicNameTH', $data['organization'] )->get();
        }
        
        // รถทั้งหมด
        $myCar_all = Register_car::where('user_id', $id)
            ->where('active', "Yes")
            ->get();

        // รถของฉัน
        $myCars = Register_car::where('user_id', $id)
            ->where('car_type', "car")
            ->where('active', "Yes")
            ->where('juristicNameTH', null)
            ->get();

        $myMotors = Register_car::where('user_id', $id)
            ->where('car_type', "motorcycle")
            ->where('active', "Yes")
            ->where('juristicNameTH', null)
            ->get();

        // รถขององค์กร
        if (!empty($data['organization'])) {
            $org_myCars = Register_car::where('user_id', $id)
                ->where('car_type', "car")
                ->where('active', "Yes")
                ->where('juristicNameTH', $data['organization'])
                ->get();

            $org_myMotors = Register_car::where('user_id', $id)
                ->where('car_type', "motorcycle")
                ->where('active', "Yes")
                ->where('juristicNameTH', $data['organization'])
                ->get();
        }else{
            $org_myCars = Register_car::where('car_type', "ไม่มี")
                ->get();

            $org_myMotors = Register_car::where('car_type', "ไม่มี")
                ->get();
        }

        // SOS
        $mySos = Sos_map::where('user_id', $id)->get();

        //ถูกเรียก
        $reported = 0 ;
        foreach ($myCar_all as $key) {

            $search_reported = Guest::where('register_car_id', $key->id)
                ->get();

            $reported = $reported + count($search_reported);
        }

        //เรียกผู้อื่น
        $myReport = Guest::where('user_id', $id)->get();

        return view('ProfileUser/Profile' , compact('data' ,'organization','myCars','myMotors','mySos','myReport','reported','org_myCars','org_myMotors') );
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

        if (!empty($data['organization'])) {
            $user_organization = $data['organization'];
        }else{
            $user_organization = "0";
        }
        
        if (Auth::id() == $id or Auth::user()->role == "admin" or Auth::user()->role == 'admin-partner')
        {
            $organization = "";
            if (!empty($data['organization'])) {
                $organization = Organization::where('juristicNameTH', $data['organization'] )->get();
            }
            
            // รถทั้งหมด
            $myCar_all = Register_car::where('user_id', $id)
                ->where('active', "Yes")
                ->get();

            // รถของฉัน
            $myCars = Register_car::where('user_id', $id)
                ->where('car_type', "car")
                ->where('active', "Yes")
                ->where('juristicNameTH', null)
                ->get();

            $myMotors = Register_car::where('user_id', $id)
                ->where('car_type', "motorcycle")
                ->where('active', "Yes")
                ->where('juristicNameTH', null)
                ->get();

            // รถขององค์กร
            if (!empty($data['organization'])) {
                $org_myCars = Register_car::where('user_id', $id)
                    ->where('car_type', "car")
                    ->where('active', "Yes")
                    ->where('juristicNameTH', $data['organization'])
                    ->get();

                $org_myMotors = Register_car::where('user_id', $id)
                    ->where('car_type', "motorcycle")
                    ->where('active', "Yes")
                    ->where('juristicNameTH', $data['organization'])
                    ->get();
            }else{
                $org_myCars = Register_car::where('car_type', "ไม่มี")
                    ->get();

                $org_myMotors = Register_car::where('car_type', "ไม่มี")
                    ->get();
            }

            // SOS
            $mySos = Sos_map::where('user_id', $id)->get();

            //ถูกเรียก
            $reported = 0 ;
            foreach ($myCar_all as $key) {

                $search_reported = Guest::where('register_car_id', $key->id)
                    ->get();

                $reported = $reported + count($search_reported);
            }

            //เรียกผู้อื่น
            $myReport = Guest::where('user_id', $id)->get();

            return view('ProfileUser/Profile' , compact('data' ,'organization','myCars','myMotors','mySos','myReport','reported','org_myCars','org_myMotors','user_organization') );
            
        }else
            return view('404');
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

            return view('ProfileUser/edit', compact('data','name_university'));
            
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
        // echo "<pre>";
        // print_r($requestData);
        // echo "<pre>";
        // exit();

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

}
