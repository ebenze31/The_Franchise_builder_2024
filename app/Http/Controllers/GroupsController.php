<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Models\Pc_point;
use App\Models\Activity;

use App\Models\Group;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data_user = Auth::user();

        // return view('teams_qualified');

        // Admin
        if(Auth::user()->role == "Super-admin" || Auth::user()->role == "Admin" || Auth::user()->role == "Staff"){
            $activeGroupsCount = Group::where('active', 'Yes')->count();
            return view('groups.index' , compact('activeGroupsCount'));
        }

        // Player
        $check = $data_user->group_status ;
        $validOptions = ["กำลังขอเข้าร่วมบ้าน", "Host Accept", "Host Reject", "Team Ready"];

        if( in_array($check, $validOptions) ){
            return redirect('preview_team'.'/'.$data_user->group_id);
        }else{
            $activeGroupsCount = Group::where('active', 'Yes')->count();
            return view('groups.index' , compact('activeGroupsCount'));
        }


        // Player
        // if( empty($data_user->group_id) && !empty($data_user->time_cf_pay_slip) ){
        //     $activeGroupsCount = Group::where('active', 'Yes')->count();
        //     return view('groups.index' , compact('activeGroupsCount'));
        // }
        // else if( !empty($data_user->group_id) && $data_user->group_status == "กำลังขอเข้าร่วมบ้าน" ){
        //     return redirect('preview_team'.'/'.$data_user->group_id);
        // }
        // else if( !empty($data_user->group_id) && $data_user->group_status != "กำลังขอเข้าร่วมบ้าน" ){
        //     $group_id = $data_user->group_id;
        //     return redirect('/group_my_team' .'/'. $group_id);
        // }
        // else{
        //     return redirect('scanner');
        // }

        // return view('groups.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
                if ($request->hasFile('logo')) {
            $requestData['logo'] = $request->file('logo')
                ->store('uploads', 'public');
        }

        Group::create($requestData);

        return redirect('groups')->with('flash_message', 'Group added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $group = Group::findOrFail($id);

        return view('groups.show', compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $group = Group::findOrFail($id);

        return view('groups.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
                if ($request->hasFile('logo')) {
            $requestData['logo'] = $request->file('logo')
                ->store('uploads', 'public');
        }

        $group = Group::findOrFail($id);
        $group->update($requestData);

        return redirect('groups')->with('flash_message', 'Group updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Group::destroy($id);

        return redirect('groups')->with('flash_message', 'Group deleted!');
    }

    function add_group(){

        $data_old = Group::get();
        $count_group = count($data_old);
        $activeGroupsCount = Group::where('active', 'Yes')->count();

        return view('groups.add_group' , compact('count_group','activeGroupsCount'));
    }

    function view_group(){
        return view('groups.view_group');
    }

    function get_data_view_group($Search_input)
    {
        if($Search_input == 'all'){
            $data_group = Group::get();
        }else{
            $data_group = Group::where('name_group', 'LIKE', "%$Search_input%")->get();
        }

        return $data_group ;
    }

    function create_group($amount){

        $data_old = Group::get();
        $count_group = count($data_old);

        $amount_loop = $amount + $count_group ;

        for ($i=($count_group+1); $i < ($amount_loop+1); $i++) { 
            // code...
            $key_invite = '';

            if ($i <= 9) {
                $name_group = '0'.$i ;
                // $name_group = $i ;
            }else if($i > 9 && $i < 100){
                // $name_group = '0'.$i ;
                $name_group = $i ;
            }else{
                $name_group = $i ;
            }

            $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

            // สลับตำแหน่งของตัวอักษรและตัวเลข
            $shuffled = str_shuffle($characters);

            // เลือกจำนวนตัวอักษรและตัวเลขที่คุณต้องการ
            $length = 6; // กำหนดความยาวตามที่ต้องการ
            $key_invite = substr($shuffled, 0, $length);

            $key_invite = $name_group . "-" . $key_invite;

            $requestData['key_invite'] = $key_invite ;
            $requestData['name_group'] = $name_group ;

            // // สร้างรูปกลุ่ม
            // $image = Image::make(public_path('img/bg_group/theme/bg_group.png'));

            // // แทรกตัวอักษรลงในภาพ
            // $image->text($name_group, 125, 125, function($font) {
            //     $font->file(public_path('theme_admin/fonts/Font/Font/Allianz_Neo_webfonts/ttf/AllianzNeoW01-Bold.ttf'));
            //     $font->size(100);
            //     $font->color('#ffffff');
            //     $font->align('center');
            //     $font->valign('middle');
            // });

            // // บันทึกภาพใหม่
            // $image->save(public_path('img/bg_group/logo_group/bg_group_'.$i.'.png'));

            // $requestData['logo'] = 'img/bg_group/logo_group/bg_group_'.$i.'.png' ;

            Group::create($requestData);
        }

        return count($data_old) + $amount ;

    }

    function active_group($amount)
    {

        $selectedGroups = Group::where('member', '<>', '')
            ->orderBy('id')
            ->take($amount)
            ->get();

        $selectedIds = $selectedGroups->pluck('id');

        Group::whereNotIn('id', $selectedIds)
            ->update(['active' => null]);

        Group::whereIn('id', $selectedIds)
            ->update(['active' => 'Yes']);


        $groups = Group::where('active' , null)->get();
        $amount_host = intval($amount) - count($selectedIds) ;
        // $amount_host = 20 - 3 ;

        // ตรวจสอบว่าจำนวนรอบที่ต้องการไม่เกินจำนวนของแถวที่ค้นหาได้
        $amount_host = min($amount_host, $groups->count());

        for ($i = 0; $i < $amount_host; $i++) {
            $group = $groups[$i];

            // ทำสิ่งที่คุณต้องการทำกับ $group ในแต่ละรอบ

            // ตัวอย่าง: อัปเดต 'active' เป็น 'Yes'
            $group->update(['active' => 'Yes']);
        }

        
        // foreach ($groups as $group) {

            
        // }

        // // $amount = $amount - $amount_host ;

        // Group::where('id', '>=', 1)
        //     ->where('id', '<=', $amount)
        //     ->update(['active' => 'Yes']);

        return 'success' ;

    }

    function my_team($group_id)
    {
        // return view('teams_qualified');

        $data_user = Auth::user();
        $data_groups = Group::where('id' , $group_id)->first();
        $current_week = Pc_point::orderBy('week', 'desc')->select('week')->first();

        if( !empty($current_week->week) ){
            $current_week = $current_week->week ;
        }else{
            $current_week = 0 ;
        }

        // Admin
        if(Auth::user()->role == "Super-admin" || Auth::user()->role == "Admin" || Auth::user()->role == "Staff"){
            $group_id = $data_user->group_id;
            return redirect('/group_my_team' .'/'. $group_id);
        }

        // Player
        if( empty($data_user->group_id) && !empty($data_user->time_cf_pay_slip) ){
            return redirect('/groups');
        }
        else if($data_user->group_status == "มีบ้านแล้ว" || $data_user->group_status == "ยืนยันการสร้างบ้านแล้ว"){

            if( $data_user->group_id != $group_id ){
                $group_id = $data_user->group_id;
                return redirect('/group_my_team' .'/'. $group_id);
            }
            else{

                if( !empty($data_user->time_cf_pay_slip) ){
                    $group_status = $data_user->group_status ;
                    return view('groups.my_team' , compact('group_id','group_status','data_groups','current_week'));
                }else{
                    return redirect('scanner');
                }

            }

        }
        else{
            return redirect('preview_team'.'/'.$group_id);
        }

    }

    function preview_team($group_id){

        // return view('teams_qualified');
        
        $data_user = Auth::user();
        $data_groups = Group::where('id' , $group_id)->first();

        // Admin
        if(Auth::user()->role == "Super-admin" || Auth::user()->role == "Admin" || Auth::user()->role == "Staff"){
            $group_status = $data_user->group_status ;
            return view('groups.preview_team' , compact('group_id' , 'group_status' ,'data_groups'));
        }

        // Player
        if( $data_user->group_status == "กำลังขอเข้าร่วมบ้าน" ){

            if($data_user->group_id == $group_id){
                $group_status = $data_user->group_status ;
                return view('groups.preview_team' , compact('group_id' , 'group_status' ,'data_groups'));
            }else{
                return redirect('preview_team'.'/'.$data_user->group_id);
            }
        }else{
            $group_status = $data_user->group_status ;
            return view('groups.preview_team' , compact('group_id' , 'group_status' ,'data_groups'));
        }

        // Player
        // if( empty($data_user->group_id) && !empty($data_user->time_cf_pay_slip) ){
        //     $group_status = null ;
        //     return view('groups.preview_team' , compact('group_id' , 'group_status' ,'data_groups'));
        // }
        // else if( $data_user->group_status == "มีบ้านแล้ว" || $data_user->group_status == "ยืนยันการสร้างบ้านแล้ว" ){
        //     $group_id = $data_user->group_id;
        //     return redirect('/group_my_team' .'/'. $group_id);
        // }
        // else{

        //     if( !empty($data_user->time_cf_pay_slip) ){
        //         $group_status = $data_user->group_status ;
        //         return view('groups.preview_team' , compact('group_id' , 'group_status' ,'data_groups'));
        //     }else{
        //         return redirect('scanner');
        //     }
            
        // }
    }

    function get_data_groups($type_get_data){

        if($type_get_data == "all"){
            $groups = Group::get();
        }else if($type_get_data == "Completed"){
            $groups = Group::where('status' , 'ยืนยันเรียบร้อย')->get();
        }
        else{
            $groups = Group::where('id' , $type_get_data)->first();
        }

        return $groups;

    }

    function get_data_my_team($group_id){

        $groups = Group::where('id' , $group_id)->first();
        return $groups;
    }

    function check_request_join($group_id){
        $groups = Group::where('id' , $group_id)->first();
        return $groups->request_join;
    }

    function user_join_team($type , $group_id , $user_id)
    {
        if($type == "host"){

            DB::table('groups')
            ->where([ 
                    ['id', $group_id],
                ])
            ->update([
                    'host' => $user_id,
                    'member' => '["' . $user_id . '"]',
                    'status' => 'กำลังรอ',
                ]);

            DB::table('users')
            ->where([ 
                    ['id', $user_id],
                ])
            ->update([
                    'group_id' => $group_id,
                    'group_status' => "มีบ้านแล้ว",
                ]);

        }else{

            $data_group = Group::where('id' , $group_id)->first();

            if(!empty($data_group->request_join)){
                $all_request_join = json_decode($data_group->request_join , true);
                $add_request_join = [$user_id];
                $update_request_join = array_merge($all_request_join, $add_request_join);
                $update_request_join = json_encode($update_request_join);
            }else{
                $update_request_join = '["' . $user_id . '"]' ;
            }

            DB::table('groups')
            ->where([ 
                    ['id', $group_id],
                ])
            ->update([
                    'request_join' => $update_request_join,
                ]);

            DB::table('users')
            ->where([ 
                    ['id', $user_id],
                ])
            ->update([
                    'group_id' => $group_id,
                    'time_request_join' => date("Y-m-d H:i:s"),
                    'group_status' => "กำลังขอเข้าร่วมบ้าน",
                ]);
        }

        return  "success" ;
    }

    function change_group_status($type, $group_id, $user_id){

        if($type == "มีบ้านแล้ว"){

            DB::table('users')
                ->where([ 
                        ['id', $user_id],
                    ])
                ->update([
                        'group_status' => $type,
                    ]);

        }
        else if($type ==  "Host Reject"){
            DB::table('users')
                ->where([ 
                        ['id', $user_id],
                    ])
                ->update([
                        'group_id' => null,
                        'group_status' => null,
                    ]);

        }
        else if($type ==  "ยืนยันการสร้างบ้านแล้ว"){

            $dataUser = User::where('id' , $user_id)->first();
            $dataActivities = Activity::where('name_Activities' , 'Team Completed!')->first();

            $update_Activities = '';
            if( !empty($dataUser->activities) ){
                $update_Activities = $dataUser->activities . "," . $dataActivities->id ;
            }else{
                $update_Activities = $dataActivities->id ;
            }

            DB::table('users')
                ->where([ 
                        ['id', $user_id],
                    ])
                ->update([
                        'group_status' => 'ยืนยันการสร้างบ้านแล้ว',
                        'activities' => $update_Activities,
                    ]);
        }
       

        return  "success" ;

    }

    function CF_answer_request($answer , $member_id , $group_id)
    {
        $member_id_to_add = $member_id; 
        $data_group = Group::where('id', $group_id)->first();
        $list_member = json_decode($data_group->member, true);
        $list_request_join = json_decode($data_group->request_join, true);

        if($answer == "Accept"){
            // User
            DB::table('users')
                ->where([ 
                        ['id', $member_id],
                    ])
                ->update([
                        'group_status' => 'Host Accept',
                        'time_request_join' => null,
                    ]);

            // เพิ่ม $member_id_to_add เข้าไปใน $list_member
            array_push($list_member, $member_id_to_add);

            // ลบ $member_id_to_add ออกจาก $list_request_join
            $list_request_join = array_diff($list_request_join, [$member_id_to_add]);

            // ตรวจสอบว่า $list_request_join ว่างหรือไม่
            if (empty($list_request_join)) {
                // ถ้าว่างให้กำหนดค่าเป็น null
                $data_group->request_join = null;
                $update_request_join = null;
            } else {
                // ไม่ว่างให้ encode กลับเป็น JSON และอัปเดตในฐานข้อมูล
                $list_request_join = array_values($list_request_join);
                $data_group->request_join = json_encode($list_request_join);
            }

            if( count($list_member) == 10 ){

                // อัปเดตข้อมูลในฐานข้อมูล
                // $data_group->group_status = 'ยืนยันเรียบร้อย';
                // $data_group->member = json_encode($list_member);
                // $data_group->save();

                for ($i=0; $i < count($list_member); $i++) { 
                    DB::table('users')
                        ->where([ 
                                ['id', $list_member[$i]],
                            ])
                        ->update([
                                'group_status' => 'Team Ready',
                                'time_request_join' => null,
                            ]);
                }

                if( !empty($list_request_join) ){
                    for ($xz=0; $xz < count($list_request_join); $xz++) { 
                        DB::table('users')
                            ->where([ 
                                    ['id', $list_request_join[$xz]],
                                ])
                            ->update([
                                    'group_status' => 'Host Reject',
                                    'time_request_join' => null,
                                ]);
                    }

                    $update_request_join = null;
                }

                DB::table('groups')
                    ->where([ 
                            ['id', $group_id],
                        ])
                    ->update([
                            'status' => 'ยืนยันเรียบร้อย',
                            'member' => json_encode($list_member),
                            'request_join' => $update_request_join,
                        ]);

            }else{

                // อัปเดตข้อมูลในฐานข้อมูล
                $data_group->member = json_encode($list_member);
                $data_group->save();
            }


        }
        else if($answer == "Reject"){
            // User
            DB::table('users')
                ->where([ 
                        ['id', $member_id],
                    ])
                ->update([
                        'group_status' => 'Host Reject',
                        'time_request_join' => null,
                    ]);

            // ลบ $member_id_to_add ออกจาก $list_request_join
            $list_request_join = array_diff($list_request_join, [$member_id_to_add]);

            // ตรวจสอบว่า $list_request_join ว่างหรือไม่
            if (empty($list_request_join)) {
                // ถ้าว่างให้กำหนดค่าเป็น null
                $data_group->request_join = null;
            } else {
                // ไม่ว่างให้ encode กลับเป็น JSON และอัปเดตในฐานข้อมูล
                $list_request_join = array_values($list_request_join);
                $data_group->request_join = json_encode($list_request_join);
            }

            // อัปเดตข้อมูลในฐานข้อมูล
            $data_group->member = json_encode($list_member);
            $data_group->save();
        }

        return  "success" ;
    }

    function group_show_score($id){

        // $data_groups = User::where('group_id' , $id)->get();

        // return view('groups.group_show_score' , compact('data_groups'));
        return view('groups.group_show_score');

    }

    function get_data_group_show_score($id){

        $data = [] ;

        // $data_User = User::where('group_id' , $id)->get();

        $check_week = Pc_point::where('week', 'not like', 'old-%')
            ->orderByRaw('CAST(SUBSTRING_INDEX(`week`, "-", -1) AS UNSIGNED) DESC')
            ->first();

        $week = $check_week->week ;

        $data_groups = Group::where('id' , $id)->first();
        $host = $data_groups->host ;

        $data_Pc_point = Pc_point::where('group_id' , $id)
            ->where('week' , $week)
            ->get();

        // แปลง JSON เป็น associative array
        $data_array = json_decode($data_Pc_point, true);

        // ฟังก์ชันสำหรับเรียงลำดับข้อมูลตาม pc_point จากมากไปน้อย
        usort($data_array, function($a, $b) {
            return $b['pc_point'] - $a['pc_point'];
        });

        // แปลง associative array กลับเป็น JSON
        $new_json_data = json_encode($data_array);

        // แปลง JSON เป็น associative array
        $new_data_array = json_decode($new_json_data, true);

        // ตรวจสอบว่าการแปลงสำเร็จหรือไม่ก่อนทำการใช้งาน
        if ($new_data_array) {
            // เข้าถึงข้อมูลในลูป
            for ($i = 0; $i < count($new_data_array); $i++) { 
                $data_User = User::where('id', $new_data_array[$i]['user_id'])->first();
                if ($data_User) {
                    $new_data_array[$i]['name_user'] = $data_User->name ;
                    $new_data_array[$i]['photo_user'] = $data_User->photo ;
                }
            }

            // แปลงกลับเป็น JSON หลังจากปรับปรุงข้อมูล
            $updated_json_data = json_encode($new_data_array);
        }

        $data['host'] = $host ;
        $data['json'] = $new_data_array ;

        return $data ;

    }
}