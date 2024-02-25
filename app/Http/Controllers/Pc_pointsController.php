<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use App\User;

use App\Models\Pc_point;
use Illuminate\Http\Request;
use App\Models\Group;

class Pc_pointsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $pc_points = Pc_point::where('week', 'LIKE', "%$keyword%")
                ->orWhere('pc_point', 'LIKE', "%$keyword%")
                ->orWhere('new_code', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('group_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $pc_points = Pc_point::latest()->paginate($perPage);
        }

        return view('pc_points.index', compact('pc_points'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pc_points.create');
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
        
        Pc_point::create($requestData);

        return redirect('pc_points')->with('flash_message', 'Pc_point added!');
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
        $pc_point = Pc_point::findOrFail($id);

        return view('pc_points.show', compact('pc_point'));
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
        $pc_point = Pc_point::findOrFail($id);

        return view('pc_points.edit', compact('pc_point'));
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
        
        $pc_point = Pc_point::findOrFail($id);
        $pc_point->update($requestData);

        return redirect('pc_points')->with('flash_message', 'Pc_point updated!');
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
        Pc_point::destroy($id);

        return redirect('pc_points')->with('flash_message', 'Pc_point deleted!');
    }

    function add_score(){
        return view('pc_points.add_score');
    }

    function create_score(Request $request){

        $requestData = $request->all();
        $data_arr = [];
        $group_pc = [] ;

        $check_week = '';

        foreach ($requestData as $item) {

            foreach ($item as $key => $value) {

                if($key == "account"){
                    $data_user = User::where('account' , $value)->first();
                    if(empty($data_user)){
                        $data_arr['user_id'] = 0 ;
                    }else{
                        $data_arr['user_id'] = $data_user->id;
                    }
                }
                else if($key == "group_id"){
                    $data_arr[$key] = str_replace("Team","",$value);
                }
                else if($key == "week"){
                    $check_week = $value;
                    $data_arr[$key] = $value;
                }
                else{
                    $data_arr[$key] = $value;
                }

            }

            $check_old_week = Pc_point::where('week',$check_week)
                ->where('user_id',$data_arr['user_id'])
                ->first();

            if( !empty($check_old_week->id) ){
                Pc_point::where('id', $check_old_week->id)
                    ->update(['week' => 'old-'.$check_week]);
            }

            // $check_old_week = Pc_point::where('week',$check_week)->first();
            // if( !empty($check_old_week->id) ){
            //     Pc_point::where('week', $check_week)->delete();
            // }

            // เพิ่มคะแนนเข้า DB
            Pc_point::create($data_arr);

            // รวมคะแนนสำหรับกลุ่ม
            if( empty($group_pc[$data_arr['group_id']]) ){

                $newArray = array(
                    'group_id' => $data_arr['group_id'],
                    'week' => $data_arr['week'],
                    'pc_point' => $data_arr['pc_point'],
                    'team_rank_of_week' => $data_arr['team_rank_of_week'],
                    'team_rank_last_week' => $data_arr['team_rank_last_week'],
                    'pc_grand_of_gweek' => $data_arr['pc_grand_of_gweek'],
                    'pc_grand_last_gweek' => $data_arr['pc_grand_last_gweek'],
                    'nc_grand_of_gweek' => $data_arr['nc_grand_of_gweek'],
                    'nc_grand_last_gweek' => $data_arr['nc_grand_last_gweek'],
                    'mission1' => $data_arr['mission1'],
                    'new_code' => $data_arr['new_code'],
                    'grandmission' => $data_arr['grandmission'],
                );

                $group_pc[$data_arr['group_id']] = $newArray;

            }else{
                $group_pc[$data_arr['group_id']]['pc_point'] = $group_pc[$data_arr['group_id']]['pc_point'] + $data_arr['pc_point'] ;
                $group_pc[$data_arr['group_id']]['mission1'] = $group_pc[$data_arr['group_id']]['mission1'] + $data_arr['mission1'] ;
                $group_pc[$data_arr['group_id']]['new_code'] = $group_pc[$data_arr['group_id']]['new_code'] + $data_arr['new_code'] ;
                $group_pc[$data_arr['group_id']]['grandmission'] = $group_pc[$data_arr['group_id']]['grandmission'] + $data_arr['grandmission'] ;

            }

        }

        // print_r($group_pc);

        // จัดลำดับคะแนนกลุ่ม
        usort($group_pc, function($a, $b) {
            return $b['pc_point'] - $a['pc_point'];
        });

        for ($i=0; $i < count($group_pc); $i++) { 

            $data_groups = Group::where('id' , $group_pc[$i]['group_id'])->first();
            $rank_record_update = [] ;

            // $update_arr_rank = "";

            // if($check_week == "0"){
            //     $update_arr_rank = 0;
            // }else{
            //     $update_arr_rank = ($i + 1);
            // }

            if( empty($data_groups->rank_record) ){ // ไม่มีข้อมูล week ก่อน

                $new_rank_record = [] ;

                $new_rank_record[$group_pc[$i]['week']] = [
                    'week' => $group_pc[$i]['week'],
                    'pc_point' => $group_pc[$i]['pc_point'],
                    // 'rank' => $update_arr_rank,
                    'team_rank_of_week' => $group_pc[$i]['team_rank_of_week'],
                    'team_rank_last_week' => $group_pc[$i]['team_rank_last_week'],
                    'pc_grand_of_gweek' => $group_pc[$i]['pc_grand_of_gweek'],
                    'pc_grand_last_gweek' => $group_pc[$i]['pc_grand_last_gweek'],
                    'nc_grand_of_gweek' => $group_pc[$i]['nc_grand_of_gweek'],
                    'nc_grand_last_gweek' => $group_pc[$i]['nc_grand_last_gweek'],
                    'mission1' => $group_pc[$i]['mission1'],
                    'new_code' => $group_pc[$i]['new_code'],
                    'grandmission' => $group_pc[$i]['grandmission'],
                ];

                $rank_record_update = json_encode($new_rank_record);

            }else{ // มีข้อมูล week ก่อน

                $old_arr = json_decode($data_groups->rank_record, true);

                $old_arr[$group_pc[$i]['week']] = [
                    'week' => $group_pc[$i]['week'],
                    'pc_point' => $group_pc[$i]['pc_point'],
                    // 'rank' => $update_arr_rank,
                    'team_rank_of_week' => $group_pc[$i]['team_rank_of_week'],
                    'team_rank_last_week' => $group_pc[$i]['team_rank_last_week'],
                    'pc_grand_of_gweek' => $group_pc[$i]['pc_grand_of_gweek'],
                    'pc_grand_last_gweek' => $group_pc[$i]['pc_grand_last_gweek'],
                    'nc_grand_of_gweek' => $group_pc[$i]['nc_grand_of_gweek'],
                    'nc_grand_last_gweek' => $group_pc[$i]['nc_grand_last_gweek'],
                    'mission1' => $group_pc[$i]['mission1'],
                    'new_code' => $group_pc[$i]['new_code'],
                    'grandmission' => $group_pc[$i]['grandmission'],
                ];

                // แปลง array ใหม่เป็น JSON
                $rank_record_update = json_encode($old_arr);

            }

            // แก้ไข rank_of_week , rank_last_week
            $update_rank_of_week = '';
            $update_rank_last_week = '';

            if($check_week == "0"){
                $update_rank_of_week = 0;
                $update_rank_last_week = 0;
            }
            else{

                if( !empty($data_groups->rank_of_week) ){
                    // $update_rank_last_week = $data_groups->rank_of_week;
                    // $update_rank_of_week = ($i + 1);

                    $update_rank_of_week = $group_pc[$i]['team_rank_of_week'];
                    $update_rank_last_week = $group_pc[$i]['team_rank_last_week'];
                    $update_pc_grand_of_gweek = $group_pc[$i]['pc_grand_of_gweek'];
                    $update_pc_grand_last_gweek = $group_pc[$i]['pc_grand_last_gweek'];
                    $update_nc_grand_of_gweek = $group_pc[$i]['nc_grand_of_gweek'];
                    $update_nc_grand_last_gweek = $group_pc[$i]['nc_grand_last_gweek'];
                }else{
                    $update_rank_of_week = $group_pc[$i]['team_rank_of_week'];
                    $update_rank_last_week = $group_pc[$i]['team_rank_last_week'];
                    $update_pc_grand_of_gweek = $group_pc[$i]['pc_grand_of_gweek'];
                    $update_pc_grand_last_gweek = $group_pc[$i]['pc_grand_last_gweek'];
                    $update_nc_grand_of_gweek = $group_pc[$i]['nc_grand_of_gweek'];
                    $update_nc_grand_last_gweek = $group_pc[$i]['nc_grand_last_gweek'];
                }
            }

            DB::table('groups')
                ->where([ 
                        ['id', $group_pc[$i]['group_id']],
                    ])
                ->update([
                        'rank_record' => $rank_record_update,
                        'rank_of_week' => $update_rank_of_week,
                        'rank_last_week' => $update_rank_last_week,
                        'pc_grand_of_gweek' => $update_pc_grand_of_gweek,
                        'pc_grand_last_gweek' => $update_pc_grand_last_gweek,
                        'nc_grand_of_gweek' => $update_nc_grand_of_gweek,
                        'nc_grand_last_gweek' => $update_nc_grand_last_gweek,
                    ]);

        }

        return "success" ;
    
    }

    function get_data_rank($type){

        // $check_week = Pc_point::orderBy('week', 'desc')->first();
        // $check_week = Pc_point::where('week', 'not like', 'old-%')
        //     ->orderBy('week', 'desc')
        //     ->first();

        $check_week = Pc_point::where('week', 'not like', 'old-%')
            ->orderByRaw('CAST(SUBSTRING_INDEX(`week`, "-", -1) AS UNSIGNED) DESC')
            ->first();

        $week = $check_week->week ;
        $as_of = $check_week->created_at ;

        if($week == "0"){

            if($type == 'individual'){
                $data = DB::table('pc_points')
                    ->join('users', 'users.id', '=', 'pc_points.user_id')
                    ->select('pc_points.*' , 'users.name as user_name', 'users.photo as user_photo')
                    ->where('week' , $week)
                    ->orderBy(DB::raw('CAST(pc_points.group_id AS SIGNED)'), 'ASC')
                    ->get();
            }
            else if($type == 'team'){
                $data['data'] = DB::table('groups')
                    ->where('rank_of_week' , '!=' , null)
                    ->orderBy(DB::raw('CAST(id AS SIGNED)'), 'ASC')
                    ->get();

                $data['week'] = $week;
                $data['as_of'] = $as_of;
            }

        }
        else{

            if($type == 'individual'){
                $data = DB::table('pc_points')
                    ->join('users', 'users.id', '=', 'pc_points.user_id')
                    ->select('pc_points.*' , 'users.name as user_name', 'users.photo as user_photo')
                    ->where('week' , $week)
                    ->orderBy(DB::raw('CAST(pc_points.rank_of_week AS SIGNED)'), 'ASC')
                    ->get();
            }
            else if($type == 'individual_end_m2'){
                $data = DB::table('pc_points')
                    ->join('users', 'users.id', '=', 'pc_points.user_id')
                    ->select('pc_points.*' , 'users.name as user_name', 'users.photo as user_photo')
                    ->where('week' , $week)
                    ->orderBy('users.name', 'ASC')
                    ->get();
            }
            else if($type == 'individual_pc'){
                $data = DB::table('pc_points')
                    ->join('users', 'users.id', '=', 'pc_points.user_id')
                    ->select('pc_points.*' , 'users.name as user_name', 'users.photo as user_photo')
                    ->where('week' , $week)
                    ->orderBy(DB::raw('CAST(pc_points.rank_of_week AS SIGNED)'), 'ASC')
                    ->get();
            }
            else if($type == 'individual_nc'){
                $data = DB::table('pc_points')
                    ->join('users', 'users.id', '=', 'pc_points.user_id')
                    ->select('pc_points.*' , 'users.name as user_name', 'users.photo as user_photo')
                    ->where('week' , $week)
                    ->orderBy(DB::raw('CAST(pc_points.new_code AS SIGNED)'), 'ASC')
                    ->get();
            }
            else if($type == 'team'){
                $data['data'] = DB::table('groups')
                    ->where('rank_of_week' , '!=' , null)
                    ->orderBy(DB::raw('CAST(rank_of_week AS SIGNED)'), 'ASC')
                    ->get();

                $data['week'] = $week;
                $data['as_of'] = $as_of;
            }
            else if($type == 'end_mission_1'){
                $data['data'] = DB::table('groups')
                    ->where('member' , '!=' , null)
                    ->orderBy(DB::raw('CAST(id AS SIGNED)'), 'ASC')
                    ->get();

                $data['week'] = $week;
                $data['as_of'] = $as_of;
            }
        }


        return $data ;

    }

    function get_member_in_team($group_id , $week){

        // $data_group = Group::where('id' , $group_id)->first();

        // $data = Pc_point::where('week', $week)
        //     ->where('group_id', $group_id)
        //     ->orderBy('pc_point', 'desc')
        //     ->get();

        // $data = DB::table('pc_points')
        //         ->join('users', 'users.id', '=', 'pc_points.user_id')
        //         ->select('pc_points.*' , 'users.name as user_name', 'users.photo as user_photo')
        //         // ->where('pc_points.week' , $week)
        //         ->where('pc_points.week', 'not like', 'old-%')
        //         ->where('pc_points.group_id', $group_id)
        //         ->orderBy(DB::raw('CAST(pc_points.pc_point AS SIGNED)'), 'DESC')
        //         ->get();

        // $sums = [];

        // foreach ($data as $row) {
        //     $user_id = $row->user_id;
        //     $year = date('Y', strtotime($row->created_at));
        //     $month = date('m', strtotime($row->created_at));

        //     // ผลรวม pc_point ของแต่ละ user_id
        //     if (!isset($sums[$user_id])) {
        //         $sums[$user_id] = [
        //             'user_id' => $user_id,
        //             'user_name' => $row->user_name,
        //             'user_photo' => $row->user_photo,
        //             'total' => 0,
        //             'yearly' => [],
        //             'monthly' => [],
        //         ];
        //     }

        //     $sums[$user_id]['total'] += $row->pc_point;

        //     // ผลรวม pc_point ประจำปี
        //     if (!isset($sums[$user_id]['yearly'][$year])) {
        //         $sums[$user_id]['yearly'][$year] = 0;
        //     }

        //     $sums[$user_id]['yearly'][$year] += $row->pc_point;

        //     // ผลรวม pc_point ประจำเดือน
        //     if (!isset($sums[$user_id]['monthly'][$year])) {
        //         $sums[$user_id]['monthly'][$year] = [];
        //     }

        //     if (!isset($sums[$user_id]['monthly'][$year][$month])) {
        //         $sums[$user_id]['monthly'][$year][$month] = 0;
        //     }

        //     $sums[$user_id]['monthly'][$year][$month] += $row->pc_point;
        // }

        // usort($sums, function ($a, $b) {
        //     return $b['total'] - $a['total'];
        // });

        $data = DB::table('pc_points')
                ->join('users', 'users.id', '=', 'pc_points.user_id')
                ->select('pc_points.*' , 'users.name as user_name', 'users.photo as user_photo')
                ->where('pc_points.week' , $week)
                ->where('pc_points.group_id', $group_id)
                ->orderBy(DB::raw('CAST(pc_points.pc_point AS SIGNED)'), 'DESC')
                ->get();

        $sums = [];

        foreach ($data as $row) {
            $user_id = $row->user_id;

            // ผลรวม pc_point ของแต่ละ user_id
            if (!isset($sums[$user_id])) {
                $sums[$user_id] = [
                    'user_id' => $user_id,
                    'user_name' => $row->user_name,
                    'user_photo' => $row->user_photo,
                    'total' => $row->pc_point,
                    'yearly' => $row->pc_point,
                    'mission1' => $row->mission1,
                    'mission3' => $row->mission3,
                ];
            }
        }

        usort($sums, function ($a, $b) {
            return $b['mission1'] - $a['mission1'];
        });


        return $sums;
    }

    function get_member_in_team_for_grand_mission($group_id , $week , $type){

        $data = DB::table('pc_points')
                ->join('users', 'users.id', '=', 'pc_points.user_id')
                ->select('pc_points.*' , 'users.name as user_name', 'users.photo as user_photo')
                ->where('pc_points.week' , $week)
                ->where('pc_points.group_id', $group_id)
                ->orderBy(DB::raw('CAST(pc_points.pc_point AS SIGNED)'), 'DESC')
                ->get();

        $sums = [];

        foreach ($data as $row) {
            $user_id = $row->user_id;

            // ผลรวม pc_point ของแต่ละ user_id
            if (!isset($sums[$user_id])) {
                $sums[$user_id] = [
                    'user_id' => $user_id,
                    'user_name' => $row->user_name,
                    'user_photo' => $row->user_photo,
                    'total' => $row->pc_point,
                    'yearly' => $row->pc_point,
                    'grandmission' => $row->grandmission,
                    'new_code' => $row->new_code,
                ];
            }
        }

        if($type == 'pc'){
            usort($sums, function ($a, $b) {
                return $b['grandmission'] - $a['grandmission'];
            });
        }
        else if($type == 'nc'){
            usort($sums, function ($a, $b) {
                return $b['new_code'] - $a['new_code'];
            });
        }
        
        return $sums;
    }

    function get_users_by_id($user_id){

        $data = User::where('id', $user_id)->first();

        return $data;

    }

    function check_last_update_pc_point(){

        $check_last = Pc_point::where('week', 'not like', 'old-%')
            ->orderBy('created_at', 'desc')
            ->first();

        return $check_last ;

    }

    function get_pc_point_of_me($user_id){

        $data_user = User::where('id' , $user_id)->first();
        
        $check_week = Pc_point::where('week', 'not like', 'old-%')
            ->orderByRaw('CAST(SUBSTRING_INDEX(`week`, "-", -1) AS UNSIGNED) DESC')
            ->first();

        $data_arr = [] ;

        if( !empty($check_week->week) ){
            $week = $check_week->week ;

            $data = DB::table('pc_points')
                ->join('users', 'users.id', '=', 'pc_points.user_id')
                ->select('pc_points.*' , 'users.name as user_name', 'users.photo as user_photo')
                ->where('pc_points.week' , $week)
                ->where('pc_points.user_id' , $user_id)
                ->orderBy(DB::raw('CAST(pc_points.rank_of_week AS SIGNED)'), 'ASC')
                ->get();

            $data_group = Group::where('id',$data_user->group_id)->first();
            $rank_of_team = $data_group->rank_of_week ;

            $data_arr['data'] = $data;
            $data_arr['rank_of_team'] = $rank_of_team;

        
            return $data_arr;
        }else{
            $data_arr['data'] = 'No' ;

            return $data_arr ;
        }

    }


    // ------------------------

    function mission_1_Team_no10(Request $request)
    {
        $requestData = $request->all();
        $data_arr = [];
        $group_arr = [];

        foreach ($requestData as $item => $value) {

            $data_arr[] =  $value;

            // แปลงข้อมูลเป็น Collection
            $collection = collect($data_arr);

            // กลุ่มข้อมูลตาม group_id
            $grouped = $collection->groupBy('group_id');

            // สร้าง array ใหม่เพื่อเก็บข้อมูลที่กลุ่มตาม group_id
            $result = [];
            foreach ($grouped as $groupId => $items) {
                $result[$groupId] = $items->pluck('account')->toArray();
            }
            
        }

        $check_week = Pc_point::where('week', 'not like', 'old-%')
            ->orderByRaw('CAST(SUBSTRING_INDEX(`week`, "-", -1) AS UNSIGNED) DESC')
            ->first();
        $week = $check_week->week ;

        // ใช้ foreach loop เพื่อผ่านค่า groupId ที่มีอยู่ใน $result
        foreach ($result as $groupId => $accounts) {
            
            $user_out = User::where('group_id',$groupId)->get();

            foreach ($user_out as $outout) {
                DB::table('users')
                ->where([ 
                        ['id', $outout->id],
                    ])
                ->update([
                        'group_id' => null,
                        'group_status' => null,
                    ]);
            }

            $check_score = Pc_point::where('week',$week)
                ->where('group_id',$groupId)
                ->orderBy('mission1' , 'DESC')
                ->get();

            $new_host = '';
            $host = $check_score[0]['user_id'];

            $count_accounts = count($accounts);
            $text_group_status = '';
            if($count_accounts >= 10){
                $text_group_status = 'ยืนยันการสร้างบ้านแล้ว' ;
            }else{
                $text_group_status = 'มีบ้านแล้ว' ;
            }

            $arr_member = [];
            foreach ($accounts as $account) {

                $data_user = User::where('account',$account)->first();
                $arr_member[] = (string)$data_user->id ;

                DB::table('users')
                ->where([ 
                        ['id', $data_user->id],
                    ])
                ->update([
                        'group_id' => $groupId,
                        'group_status' => $text_group_status,
                    ]);
            }

            $data_group = Group::where('id',$groupId)->first();
            $old_host = $data_group->host ;


            if (in_array($old_host, $arr_member)) {
                $new_host = $old_host ;
            }
            else{
                $new_host = $host ;

                DB::table('users')
                ->where([ 
                        ['id', $host],
                    ])
                ->update([
                        'remark' => "new_host",
                    ]);
            }

            $status_of_group = '';
            if(count($arr_member) >= 10){
                $status_of_group = 'ยืนยันเรียบร้อย';
            }else{
                $status_of_group = 'กำลังรอ';
            }

            DB::table('groups')
                ->where([ 
                        ['id', $groupId],
                    ])
                ->update([
                        'host' => $new_host,
                        'member' => $arr_member,
                        'status' => $status_of_group,
                    ]);
        }

        return "success" ;
        // return $check_score ;

    }

    function mission_1_Team_out(Request $request)
    {
        $requestData = $request->all();
        $data_arr = [];
        
        foreach ($requestData as $item) {
            foreach ($item as $key => $value) {
                if($key == "group_id"){
                    $data_arr[] =  $value;
                }
            }
        }

        for ($i=0; $i < count($data_arr); $i++) { 
            
            $data_user = User::where('group_id' , $data_arr[$i])->get();

            foreach ($data_user as $item) {
                DB::table('users')
                ->where([ 
                        ['id', $item->id],
                    ])
                ->update([
                        'group_id' => null,
                        'group_status' => null,
                    ]);
            }

            DB::table('groups')
                ->where([ 
                        ['id', $data_arr[$i]],
                    ])
                ->update([
                        'host' => null,
                        'member' => null,
                        'status' => null,
                        'rank_of_week' => null,
                        'rank_last_week' => null,
                        'rank_record' => null,
                        'active' => null,
                    ]);

        }

        return "success" ;
        // return $data_arr ;

    }

    function mission_1_People_noTeam(Request $request)
    {
        $requestData = $request->all();
        $data_arr = [];
        
        foreach ($requestData as $item) {
            foreach ($item as $key => $value) {
                // 
            }
        }

        return "success" ;
        // return $data_arr ;

    }

    function mission_1_People_out(Request $request)
    {
        $requestData = $request->all();
        $data_arr = [];
        
        foreach ($requestData as $item) {
            foreach ($item as $key => $value) {
                if($key == "account"){
                    $data_arr[] =  $value;
                }
            }
        }

        for ($i=0; $i < count($data_arr); $i++) { 
            
            $data_user = User::where('account' , $data_arr[$i])->get();

            foreach ($data_user as $item) {
                DB::table('users')
                ->where([ 
                        ['id', $item->id],
                    ])
                ->update([
                        'status' => null,
                        'role' => 'Player_OUT',
                    ]);
            }

        }

        return "success" ;
        // return $data_arr ;

    }

    function check_role_end_mission_1($user_id){

        $data_user = User::where('id' , $user_id)->where('remark', null)->first();

        $return = 'no' ;

        if( !empty($data_user->group_id) ){
            $data_group = Group::where('id' , $data_user->group_id)->first();
            $jsonText = $data_group->member;
            $arrayData = json_decode($jsonText, true);


            if(count($arrayData) >= 10){
                $return = "perfect_team" ;
            }
            else{
                $return = "team_success" ;
            }

        }

        DB::table('users')
            ->where([ 
                    ['id', $user_id],
                ])
            ->update([
                    'remark' => 'end_mission_1',
                ]);

        return $return ;

    }

    function change_remark_user($user_id){

        DB::table('users')
            ->where([ 
                    ['id', $user_id],
                ])
            ->update([
                    'remark' => 'end_mission_1',
                ]);

        return "success" ;

    }

}

