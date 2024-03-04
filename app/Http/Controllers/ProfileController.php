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
use Illuminate\Support\Carbon;
use App\Models\Group;
use App\Models\Cancel_player;
use App\Models\Pc_point;

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

    function delete_account(){
        return view('admin.delete_account');
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

    function Registration_user(Request $request)
    {
        $requestData = $request->all();
        $requestData['password'] = Hash::make($requestData['password']);
        $requestData['qr_profile'] = $requestData['account'] . '.png';

        User::create($requestData);

        return "success" ;
    }

    function qr_profile(Request $request){

        // $user = User::where('role' , 'AL')->get();

        $yesterday = Carbon::yesterday()->toDateString();

        $user = User::where('role', 'AL')
            ->whereDate('created_at', '>', $yesterday)
            ->get();

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

    function view_cancel_join(){

        return view('admin.view_cancel_join');
    }

    function check_Team_and_Shirt_Size(Request $request)
    {
        $requestData = $request->all();

        $arr_member = isset($requestData['arr_member']) ? $requestData['arr_member'] : [];

        // $data = User::where('role', "Player")
        //     ->whereIn('id', $arr_member)
        //     ->orderBy('time_cf_pay_slip', 'ASC')
        //     ->get();

        $data = DB::table('groups')
                ->join('users', 'users.group_id', '=', 'groups.id')
                ->leftjoin('users as user_host', 'user_host.id', '=', 'groups.host')
                ->select('users.*' , 'groups.host as host' , 'user_host.name as user_host_name' , 'user_host.account as user_host_account' )
                ->where('users.role', "Player")
                ->whereIn('users.id', $arr_member)
                ->orderBy('users.time_cf_pay_slip', 'ASC')
                ->get();

        return $data ;

    }

    function get_data_user_time_request_join($user_id){

        $data_user = User::where('id', $user_id)->first();

        return $data_user ;
    }

    function get_data_user($user_id){

        // $data_user = User::where('id', $user_id)->first();

        $check_week = Pc_point::where('week', 'not like', 'old-%')
            ->orderByRaw('CAST(SUBSTRING_INDEX(`week`, "-", -1) AS UNSIGNED) DESC')
            ->first();

        $week = $check_week->week ;

        $data_user = DB::table('users')
            ->join('pc_points', 'pc_points.user_id', '=', 'users.id')
            ->select('users.*' , 'pc_points.week as week' , 'pc_points.mission1 as mission1')
            ->where('users.id', $user_id)
            ->where('pc_points.week', $week)
            ->where('pc_points.user_id', $user_id)
            ->get();

        return $data_user ;
    }

    function get_data_user_for_view_group($user_id){

        $data_user = User::where('id', $user_id)->first();

        return $data_user ;
    }

    function get_data_user_mission_2($group_id){

        $data_arr = [];
        $data_groups = Group::where('id' , $group_id)->first();
        $host = $data_groups->host ;
        // $data_user = User::where('group_id', $group_id)->get();

        $check_week = Pc_point::where('week', 'not like', 'old-%')
            ->orderByRaw('CAST(SUBSTRING_INDEX(`week`, "-", -1) AS UNSIGNED) DESC')
            ->first();

        $week = $check_week->week ;

        $data_user = DB::table('users')
            ->join('pc_points', 'pc_points.user_id', '=', 'users.id')
            ->select('users.*' , 'pc_points.week as week' , 'pc_points.pc_point as pc_point', 'pc_points.new_code as new_code', 'pc_points.created_at as as_of' , 'pc_points.grandmission as grandmission' , 'pc_points.active_dream as active_dream')
            ->where('pc_points.week', $week)
            ->where('pc_points.group_id', $group_id)
            ->orderByRaw('CAST(pc_points.new_code AS SIGNED) DESC, pc_points.grandmission DESC')
            // ->orderBy(DB::raw('CAST(pc_points.new_code AS SIGNED)'), 'DESC')
            // ->orderBy(DB::raw('CAST(pc_points.user_id AS SIGNED)'), 'DESC')
            ->get();

        $data_arr['data'] = $data_user;
        $data_arr['host'] = $host;

        return $data_arr ;
    }

    function get_data_user_grand_mission($data_sort){

        $check_week = Pc_point::where('week', 'not like', 'old-%')
            ->orderByRaw('CAST(SUBSTRING_INDEX(`week`, "-", -1) AS UNSIGNED) DESC')
            ->first();

        $week = $check_week->week ;
        $as_of = $check_week->created_at ;

        if($data_sort == "pc"){
            $data['data'] = DB::table('groups')
                ->where('pc_grand_of_gweek' , '!=' , null)
                ->orderBy(DB::raw('CAST(pc_grand_of_gweek AS SIGNED)'), 'ASC')
                ->get();
        }
        else if($data_sort == "nc"){
            $data['data'] = DB::table('groups')
                ->where('nc_grand_of_gweek' , '!=' , null)
                ->orderBy(DB::raw('CAST(nc_grand_of_gweek AS SIGNED)'), 'ASC')
                ->get();
        }
        else if($data_sort == "aa"){
            $data['data'] = DB::table('groups')
                ->where('aa_grand_of_week' , '!=' , null)
                ->orderBy(DB::raw('CAST(aa_grand_of_week AS SIGNED)'), 'ASC')
                ->get();
        }

        $data['week'] = $week;
        $data['as_of'] = $as_of;

        return $data ;

    }

    function get_data_all_team_m2(){

        $check_week = Pc_point::where('week', 'not like', 'old-%')
            ->orderByRaw('CAST(SUBSTRING_INDEX(`week`, "-", -1) AS UNSIGNED) DESC')
            ->first();

        $week = $check_week->week ;
        $as_of = $check_week->created_at ;

        $data['data'] = DB::table('groups')
            ->where('nc_grand_of_gweek' , '!=' , null)
            // ->orderBy(DB::raw('CAST(nc_grand_of_gweek AS SIGNED)'), 'ASC')
            ->orderByRaw('CAST(nc_grand_of_gweek AS SIGNED) ASC, pc_grand_of_gweek ASC')
            ->get();

        $data['week'] = $week;

        return $data ;
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

           $data = User::whereIn('role', ['Super-admin', 'Admin', 'Staff' , 'QR'])
                ->orderByRaw("FIELD(role, 'Super-admin', 'Admin', 'Staff', 'QR')")
                ->orderBy('role', 'DESC')
                ->get();

        }
        else if($type_get_data == "add_account"){
            $data = User::where('role' , "aL")
                ->orWhere('role' , "Player")
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

        if($data){

            //  --- ก่อนวันที่ 24/01 --- //
            // if( !empty($data->pdpa) ){
            //     $return = "Yes" ;
            // }else{
            //     $return ="No" ;
            // }

            //  --- วันที่ 24/01 เป็นต้นไป --- //
            // if( $data->role == 'Player' && ($data->group_status != 'Team Ready' || $data->group_status != 'ยืนยันการสร้างบ้านแล้ว') ){
            //     $return = "No Team" ;
            // }
            // else if($data->role != 'AL'){
            //     if( !empty($data->pdpa) ){
            //         $return = "Yes" ;
            //     }else{
            //         $return ="No" ;
            //     }
            // }else{
            //     $return = "No Team" ;
            // }

            if($data->role == 'AL'){
                $return = "No Team" ;
            }
            else if($data->role == 'Player'){

                // if($data->group_status == 'Team Ready' || $data->group_status == 'ยืนยันการสร้างบ้านแล้ว'){
                    if( !empty($data->pdpa) ){
                        $return = "Yes" ;
                    }else{
                        $return ="No" ;
                    }
                // }else{
                    // $return = "No Team" ;
                // }

            }else{
                if( !empty($data->pdpa) ){
                    $return = "Yes" ;
                }else{
                    $return ="No" ;
                }
            }
            
        }else{
            $return ="Account none" ;
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
                    'time_get_shirt' => date("Y-m-d H:i:s"),
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
            $data_user = User::where('shirt_size', "!=" , null)
                ->orderBy('time_get_shirt', 'DESC')
                ->get();
        }

        return $data_user ;

    }

    function CF_cancel_join($user_id){

        $member_id_to_add = $user_id;
        $dataUser = User::where('id' , $user_id)->first();
        $data_group = Group::where('id' , $dataUser->group_id)->first();

        if($dataUser->group_status == "กำลังขอเข้าร่วมบ้าน"){

            $list_request_join = json_decode($data_group->request_join, true);
            // ลบ $member_id_to_add ออกจาก $list_request_join
            $list_request_join = array_diff($list_request_join, [$member_id_to_add]);

            // ตรวจสอบว่า $list_request_join ว่างหรือไม่
            if (empty($list_request_join)) {
                // ถ้าว่างให้กำหนดค่าเป็น null
                $update_request_join = null;
            } else {
                // ไม่ว่างให้ encode กลับเป็น JSON และอัปเดตในฐานข้อมูล
                $list_request_join = array_values($list_request_join);
                $update_request_join = json_encode($list_request_join);
            }

            DB::table('groups')
                ->where([ 
                        ['id', $data_group->id],
                    ])
                ->update([
                        'request_join' => $update_request_join,
                    ]);

            DB::table('users')
                ->where([ 
                        ['id', $user_id],
                    ])
                ->update([
                        'group_id' => null,
                        'group_status' => null,
                        'time_request_join' => null,
                    ]);

            $return = "กำลังขอเข้าร่วมบ้าน";

        }
        else if($dataUser->group_status != "กำลังขอเข้าร่วมบ้าน" && $dataUser->group_status != null){

            $list_member = json_decode($data_group->member, true);
            // ลบ $member_id_to_add ออกจาก $list_member
            $list_member = array_diff($list_member, [$member_id_to_add]);

            // ตรวจสอบว่า $list_member ว่างหรือไม่
            if (empty($list_member)) {
                // ถ้าว่างให้กำหนดค่าเป็น null
                $update_member = null;
            } else {
                // ไม่ว่างให้ encode กลับเป็น JSON และอัปเดตในฐานข้อมูล
                $list_member = array_values($list_member);
                $update_member = json_encode($list_member);
            }

            DB::table('groups')
                ->where([ 
                        ['id', $data_group->id],
                    ])
                ->update([
                        'member' => $update_member,
                    ]);

            DB::table('users')
                ->where([ 
                        ['id', $user_id],
                    ])
                ->update([
                        'group_id' => null,
                        'group_status' => null,
                        'time_request_join' => null,
                    ]);

            $return = "มีบ้านแล้ว";

            // ถ้าเป็นบ้านที่ครบ 10 คนแล้ว
            if($dataUser->group_status == "Team Ready" || $dataUser->group_status == "ยืนยันการสร้างบ้านแล้ว"){

                DB::table('groups')
                    ->where([ 
                            ['id', $data_group->id],
                        ])
                    ->update([
                            'status' => "กำลังรอ",
                        ]);

                $user_of_group = User::where('group_id', $data_group->id)->get();

                foreach ($user_of_group as $usg) {
                    DB::table('users')
                        ->where([ 
                                ['id', $usg->id],
                            ])
                        ->update([
                                'group_status' => 'มีบ้านแล้ว',
                            ]);
                }

            }

        }

        return 'success' ;

    }

    function CF_delete_team($group_id){

        $data_group = Group::where('id' , $group_id)->first();

        // สมาชิกในบ้าน
        if( !empty($data_group->member) ){

            $list_member = json_decode($data_group->member, true);

            for ($i=0; $i < count($list_member); $i++) { 
                // echo "<br>";
                // echo $list_member[$i];

                DB::table('users')
                    ->where([ 
                            ['id', $list_member[$i]],
                        ])
                    ->update([
                            'group_id' => null,
                            'group_status' => null,
                            'time_request_join' => null,
                        ]);

            }
        }

        // สมาชิกที่กำลังขอเข้าร่วมบ้าน
        if( !empty($data_group->request_join) ){

            $list_request_join = json_decode($data_group->request_join, true);

            for ($zz=0; $zz < count($list_request_join); $zz++) { 
                // echo "<br>";
                // echo $list_request_join[$zz];

                DB::table('users')
                    ->where([ 
                            ['id', $list_request_join[$zz]],
                        ])
                    ->update([
                            'group_id' => null,
                            'group_status' => null,
                            'time_request_join' => null,
                        ]);

            }
        }

        // คืนค่าเริ่มต้นบ้าน
        DB::table('groups')
            ->where([ 
                    ['id', $group_id],
                ])
            ->update([
                    'host' => null,
                    'member' => null,
                    'status' => null,
                    'request_join' => null,
                ]);

        return "success" ;

    }

    function check_account_Cancel_join($account){

        $check_host = 'No';
        $data = User::where('account' , $account)->first();

        if( !empty($data->group_id) ){
            $data_group = Group::where('id' , $data->group_id)->first();

            if($data->id == $data_group->host){
                $check_host = 'Yes';
            }
        }

        $data->check_host = $check_host;
        
        return $data;

    }

    function CF_cancel_player($user_id){

        $data = User::where('id' , $user_id)->first();

        // เพิ่มข้อมูลการยกเลิกการเข้าร่วมใน Cancel_player
        $Data_player = [] ;
        $Data_player['user_id'] = $user_id;
        $Data_player['shirt_size'] = $data->shirt_size;
        $Data_player['time_get_shirt'] = $data->time_get_shirt;;
        $Data_player['time_joined'] = $data->time_cf_pay_slip;;

        Cancel_player::create($Data_player);

        // เช็คว่ามีบ้านหรือไม่
        if( !empty($data->group_id) ){
            $data_group = Group::where('id' , $data->group_id)->first();

            // เช็คว่าเป็น Host หรือไม่
            if($data->id == $data_group->host){
                $this->CF_delete_team($data->group_id);
            }
            else{
                $this->CF_cancel_join($user_id);
            }

        }

        // เช็คว่ามี Activities หรือไม่
        if( !empty($data->activities) ){
            $list_activities = explode(",",$data->activities);

            for ($i=0; $i < count($list_activities); $i++) { 

                $data_Activity = Activity::where('id',$list_activities[$i])->first();

                $old_amount = $data_Activity->member ;
                $new_amount = intval($data_Activity->member) - 1 ;

                DB::table('activities')
                    ->where([ 
                            ['id', $data_Activity->id],
                        ])
                    ->update([
                            'member' => $new_amount,
                        ]);

                // delete Activities_log
                $data_Activities_log = Activities_log::where('id_Activities',$data_Activity->id)
                    ->where('user_id' , $user_id)
                    ->delete();
            }
        }


        DB::table('users')
            ->where([ 
                    ['id', $user_id],
                ])
            ->update([
                    'photo' => null,
                    'role' => 'AL',
                    'status' => null,
                    'group_id' => null,
                    'group_status' => null,
                    'time_cf_pay_slip' => null,
                    'time_request_join' => null,
                    'activities' => null,
                    'pdpa' => null,
                    'shirt_size' => null,
                    'time_get_shirt' => null,
                ]);

        return 'success' ;

    }

    function get_data_cancel_join(){

        // $data = Cancel_player::orderBy('created_at', 'DESC')->get();

        $data = DB::table('cancel_players')
                ->join('users', 'users.id', '=', 'cancel_players.user_id')
                ->select('cancel_players.*' , 'users.account as user_account' , 'users.name as user_name' , 'users.phone as user_phone' , 'users.email as user_email' )
                ->orderBy('cancel_players.created_at', 'DESC')
                ->get();

        return $data ;

    }

    function change_return_shirt($type , $id){

        if($type == "ยังไม่ได้คืนเสื้อ"){
            $type = null ;
        }
        else if($type == "คืนเสื้อแล้ว"){
            $type = 'Yes' ;
        }

        DB::table('cancel_players')
            ->where([ 
                    ['id', $id],
                ])
            ->update([
                    'return_shirt' => $type,
                ]);

        return 'success' ;

    }

    function get_data_host(){

        $data_group = Group::where('host' , '!=' , NULL)
            ->select('name_group' , 'host' , 'status')
            ->get();

        $data_arr = [];

        foreach ($data_group as $item) {
            
            $user_host = User::where('id' , $item->host)->first();
            $data_arr[] = $user_host;

        }

        return $data_arr ;
    }


    function delete_user(Request $request)
    {
        $requestData = $request->all();
        $data_arr = [];
        $count = 0;
        $i = 0 ;

        foreach ($requestData as $item) {
            foreach ($item as $key => $value) {

                if($key == "account"){
                    $check_user = User::where('account',$value)->first();

                    if( !empty($check_user->id) ){
                        $check_host = Group::where('host' , $check_user->id)->first();

                        if( !empty($check_host->id) ){
                            $count = $count + 1 ;
                            $data_arr['host'][$i] = $check_user ;
                            $i = $i + 1 ;
                        }else{
                            $data_arr['member'][$value] = $check_user->id ;
                        }
                    }
                }
            }

        }

        foreach ($data_arr['member'] as $memberId => $value) {
            $this->CF_cancel_player($value);
        }

        $data_arr['host']['count'] = count($data_arr['host']);

        return $data_arr['host'] ;
        // return "มี HOST >> " . $count ;

    }


}
