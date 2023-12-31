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
                else{
                    $data_arr[$key] = $value;
                }

            }
            // เพิ่มคะแนนเข้า DB
            Pc_point::create($data_arr);

            // รวมคะแนนสำหรับกลุ่ม
            if( empty($group_pc[$data_arr['group_id']]) ){

                $newArray = array(
                    'group_id' => $data_arr['group_id'],
                    'week' => $data_arr['week'],
                    'pc_point' => $data_arr['pc_point']
                );

                $group_pc[$data_arr['group_id']] = $newArray;

            }else{
                $group_pc[$data_arr['group_id']]['pc_point'] = $group_pc[$data_arr['group_id']]['pc_point'] + $data_arr['pc_point'] ;
            }

        }

        // จัดลำดับคะแนนกลุ่ม
        usort($group_pc, function($a, $b) {
            return $b['pc_point'] - $a['pc_point'];
        });

        for ($i=0; $i < count($group_pc); $i++) { 

            $data_groups = Group::where('id' , $group_pc[$i]['group_id'])->first();
            $rank_record_update = [] ;

            if( empty($data_groups->rank_record) ){ // ไม่มีข้อมูล week ก่อน

                $new_rank_record = [] ;

                $new_rank_record[$group_pc[$i]['week']] = [
                    'week' => $group_pc[$i]['week'],
                    'pc_point' => $group_pc[$i]['pc_point'],
                    'rank' => ($i + 1),
                ];

                $rank_record_update = json_encode($new_rank_record);

            }else{ // มีข้อมูล week ก่อน

                $old_arr = json_decode($data_groups->rank_record, true);

                $old_arr[$group_pc[$i]['week']] = [
                    'week' => $group_pc[$i]['week'],
                    'pc_point' => $group_pc[$i]['pc_point'],
                    'rank' => ($i + 1),
                ];

                // แปลง array ใหม่เป็น JSON
                $rank_record_update = json_encode($old_arr);

            }

            // แก้ไข rank_of_week , rank_last_week
            $update_rank_of_week = '';
            $update_rank_last_week = '';

            if( !empty($data_groups->rank_of_week) ){
                $update_rank_last_week = $data_groups->rank_of_week;
                $update_rank_of_week = ($i + 1);
            }else{
                $update_rank_last_week = ($i + 1);
                $update_rank_of_week = ($i + 1);
            }

            DB::table('groups')
                ->where([ 
                        ['id', $group_pc[$i]['group_id']],
                    ])
                ->update([
                        'rank_record' => $rank_record_update,
                        'rank_of_week' => $update_rank_of_week,
                        'rank_last_week' => $update_rank_last_week,
                    ]);

        }

        return "success" ;
    
    }
}

