<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
use QrCode;
use Illuminate\Support\Facades\Storage;
use App\Models\Activities_log;
use App\Models\Activity;

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

        // return view('ProfileUser/Profile' , compact('data') );
        return view("first_profile");

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
    public function show()
    {
        $id = Auth::id();
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

        if ($request->hasFile('pay_slip')) {
            $requestData['pay_slip'] = $request->file('pay_slip')->store('uploads', 'public');
        }

        $requestData['status'] = "เข้าร่วมแล้ว" ;
        $requestData['role'] = "Player" ;

        $data = User::findOrFail($id);
        $data->update($requestData);

        // return redirect("register_tfb2024");
        return view("first_profile");
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

    function edit_profile(Request $request, $id)
    {
        $requestData = $request->all();
        

        // Crop ภาพ
        if ($request->hasFile('photo')) {
            $requestData['photo'] = $request->file('photo')->store('uploads', 'public');

            // ตำแหน่งและขนาดของภาพที่คุณต้องการ crop
            $cropX = (int)$requestData['currentX']; // ตำแหน่ง x ที่จะ crop
            $cropY = (int)$requestData['currentY']; // ตำแหน่ง y ที่จะ crop
            $cropWidth = (int)$requestData['currentWidth']; // ขนาดความกว้างที่จะ crop
            $cropHeight = (int)$requestData['currentHeight']; // ขนาดความสูงที่จะ crop

            // เรียกรูปภาพ
            $imagePath = storage_path("app/public")."/".$requestData['photo'];
            $image = Image::make($imagePath);
            $image->orientate();

            // Crop ภาพ
            $image->crop($cropWidth, $cropHeight, $cropX, $cropY);

            // Save ภาพหลังจาก crop
            $image->save($imagePath);

        }
        
        $data_user = Auth::user();
        $data = User::where('id',$data_user->id)->first();



        if ($requestData['type'] == "first_profile") {
            
            $requestData['status'] = "เข้าร่วมแล้ว" ;
            $requestData['role'] = "Player" ;
            $requestData['time_cf_pay_slip'] = date("Y-m-d H:i:s") ;
            
            $data->update($requestData);

            return redirect("groups");
        } else {

            $data->update($requestData);
            return redirect("profile");

        }
        
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

            $data_arr['qr_profile'] = $data_arr['account'] . '.png';

            $check_user = User::where('account',$data_arr['account'])->first();

            if( !empty($check_user->account) ){

                if(!empty($check_user->status)){
                    $role = $check_user->role ;
                }else{
                    $role = $data_arr['role'] ;
                }

                DB::table('users')
                    ->where([ 
                            ['account', $data_arr['account']],
                        ])
                    ->update([
                            'password' => $data_arr['password'],
                            'name' => $data_arr['name'],
                            'phone' => $data_arr['phone'],
                            'email' => $data_arr['email'],
                            'role' => $role,
                        ]);
            }else{
                User::create($data_arr);
            }
        }

        return "success" ;

    }

    function qr_profile(Request $request){

        $user = User::get();

        foreach ($user as $item) {
            $url_for_scan = 'https://www.franchisebuilder2024.com' . "/for_scan" ;
            $url_for_scan = str_replace("/var/www/","",$url_for_scan);
            $url_for_scan = str_replace("/api/qr_profile","",$url_for_scan);
            // QR-CODE
            $url = "https://chart.googleapis.com/chart?cht=qr&chl=".$url_for_scan."?account=".$item->account."&chs=500x500&choe=UTF-8" ;

            $img = public_path("img/qr_profile" . "/" . $item->account . '.png');
            // Save image
            file_put_contents($img, file_get_contents($url));
        }

        return "success";
    }

    // function create_qr_code(Request $request)
    // {
    //     $requestData = $request->all();
        
    //     foreach ($requestData as $item) {
    //         foreach ($item as $key => $value) {
    //             $data_arr[$key] = $value;
    //         }

    //         $check_user = User::where('account',$data_arr['account'])->first();

    //         if( !empty($check_user->account) ){
    //             $return = "ไม่สร้าง";
    //         }else{

    //             $url_for_scan = $request->fullUrl() . "/for_scan" ;
    //             $url_for_scan = str_replace("/var/www/","www.",$url_for_scan);
    //             // QR-CODE
    //             $url = "https://chart.googleapis.com/chart?cht=qr&chl=account=".$data_arr['account']."&chs=500x500&choe=UTF-8" ;

    //             $img = public_path("img/qr_profile" . "/" . $data_arr['account'] . '.png');
    //             // Save image
    //             file_put_contents($img, file_get_contents($url));

    //             $return = "สร้าง";

    //             sleep(3);
    //         }
    //     }

    //     return $return ;
    // }

    function account_all(){
        return view('admin.account_all');
    }

    function account_reg_success(){
        return view('admin.account_reg_success');
    }

    function account_admin(){
        return view('admin.account_admin');
    }

    function get_account_reg_success(Request $request)
    {
        $requestData = $request->all();
        // ตรวจสอบว่า arr_member มีค่าหรือไม่
        $arr_member = isset($requestData['arr_member']) ? $requestData['arr_member'] : [];

        $data = User::where('role', "Player")
            ->whereNotIn('id', $arr_member)
            ->orderBy('time_cf_pay_slip', 'ASC')
            ->get();

        return $data ;
    }

    function get_data_user($user_id){

        $data_user = User::where('id', $user_id)->first();

        return $data_user ;
    }

    function get_data_me($user_id){

        $data_user = User::where('id', $user_id)->first();

        return $data_user->group_status ;
    }

    function get_time_request_join($user_id){

        $data_user = User::where('id', $user_id)->first();

        return $data_user->time_request_join ;
    }

    function get_data_account($type_get_data){

        if($type_get_data == "all"){
            $data = User::where('role' , "aL")
                ->orWhere('role' , "Player")
                ->orderBy('account','ASC')
                ->get();
        }
        else if($type_get_data == "admin"){
            // $data = User::where('role' , "Super-admin")
            //     ->orWhere('role' , "Admin")
            //     ->orWhere('role' , "Staff")
            //     ->orderBy('role','DESC')
            //     ->get();

           $data = User::whereIn('role', ['Super-admin', 'Admin', 'Staff'])
                ->orderByRaw("FIELD(role, 'Super-admin', 'Admin', 'Staff')")
                ->orderBy('role', 'DESC')
                ->get();

        }
        else{
            $data = User::where('account', 'LIKE', "%$type_get_data%")
                ->orWhere('name', 'LIKE', "%$type_get_data%")
                ->orWhere('phone', 'LIKE', "%$type_get_data%")
                ->orWhere('email', 'LIKE', "%$type_get_data%")
                ->orWhere('role', 'LIKE', "%$type_get_data%")
                ->orWhere('status', 'LIKE', "%$type_get_data%")
                ->get();
        }

        return $data;

    }

    function change_status($account , $Staff_id){

        DB::table('users')
            ->where([ 
                    ['account', $account],
                ])
            ->update([
                    // 'role' => 'Player',
                    // 'status' => 'เข้าร่วมแล้ว',
                    'staff_pay_slip_id' => $Staff_id,
                    'time_cf_pay_slip' => date("Y-m-d H:i:s"),
                ]);

        return "success" ;

    }

    function get_users($account){

        $data = User::where('account' , $account)->first();
        
        return $data;

    }

    function check_pay_slip($user_id){

        $data = User::where('id' , $user_id)->first();
        
        return $data;

    }

    function check_pdpa($account)
    {
        $data = User::where('account' , $account)->first();

        if( !empty($data->pdpa) ){
            $return = "Yes" ;
        }else{
            $return ="No" ;
        }
        
        return $return;
    }

    function update_pdpa($account){

        DB::table('users')
            ->where([ 
                    ['account', $account],
                ])
            ->update([
                    'pdpa' => 'Yes',
                ]);

        return "success" ;
    }

    function keep_name_Activity($name_Activity , $user_id){

        DB::table('users')
            ->where([ 
                    ['id', $user_id],
                ])
            ->update([
                    'scan_qr_for' => $name_Activity,
                ]);

        return "success" ;

    }

    function cf_shirt_size($account,$Title_value){
        DB::table('users')
            ->where([ 
                    ['account', $account],
                ])
            ->update([
                    'shirt_size' => $Title_value,
                ]);

        $dataActivities = Activity::where('name_Activities' , "รับเสื้อ")->first();
        $dataUser = User::where('account' , $account)->first();

        $check_old_data = Activities_log::where('id_Activities' ,$dataActivities->id)
            ->where('user_id',$dataUser->id)
            ->first();

        if( !$check_old_data ){

            // สร้าง Activities_log
            $Data = [] ;
            $Data['id_Activities'] = $dataActivities->id;
            $Data['user_id'] = $dataUser->id;
            Activities_log::create($Data);

            // update กิจกรรมที่ user เข้าร่วม
            $update_Activities = '';
            if( !empty($dataUser->activities) ){
                $update_Activities = $dataUser->activities . "," . $dataActivities->id ;
            }else{
                $update_Activities = $dataActivities->id ;
            }
            DB::table('users')
                ->where([ 
                        ['id', $dataUser->id],
                    ])
                ->update([
                        'activities' => $update_Activities,
                    ]);


            // update จำนวน member ที่เข้าร่วม activities
            $update_member = '';
            if( !empty($dataActivities->member) ){
                $update_member = intval($dataActivities->member) + 1 ;
            }else{
                $update_member = 1 ;
            }
            DB::table('activities')
                ->where([ 
                        ['id', $dataActivities->id],
                    ])
                ->update([
                        'member' => $update_member,
                    ]);
        }

        return "success" ;
    }

    function get_data_badges($user_id){

        $data_badges = Activity::get();
        $data_user = User::where('id',$user_id)->first();

        $activities = '';
        if( !empty($data_user->activities) ){
            $activities = $data_user->activities ;
        }

        $data = [];
        $data['data_badges'] = $data_badges;
        $data['user_activities'] = $activities;

        return $data ;
    }

    function get_user_get_shirt($type){

        if($type == 'all'){
            $data_user = User::where('shirt_size', "!=" , null)->get();
        }

        return $data_user ;

    }

}
