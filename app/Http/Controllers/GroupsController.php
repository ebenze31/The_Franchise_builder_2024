<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;

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

        if( empty($data_user->group_id) ){
            $activeGroupsCount = Group::where('active', 'Yes')->count();
            return view('groups.index' , compact('activeGroupsCount'));
        }
        else if( !empty($data_user->group_id) && $data_user->group_status == "กำลังขอเข้าร่วมบ้าน" ){
            return redirect('preview_team'.'/'.$data_user->group_id);
        }
        else{
            $group_id = $data_user->group_id;
            return redirect('/group_my_team' .'/'. $group_id);
        }

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
        $groups = Group::all();

        foreach ($groups as $group) {
            $group->update(['active' => null]);
        }


        Group::where('id', '>=', 1)
            ->where('id', '<=', $amount)
            ->update(['active' => 'Yes']);

        return 'success' ;

    }

    function my_team($group_id)
    {
        $data_user = Auth::user();

        if( empty($data_user->group_id) ){
            return redirect('/groups');
        }
        else if($data_user->group_status == "มีบ้านแล้ว" || $data_user->group_status == "ยืนยันการสร้างบ้านแล้ว"){

            if( $data_user->group_id != $group_id ){
                $group_id = $data_user->group_id;
                return redirect('/group_my_team' .'/'. $group_id);
            }
            else{
                $group_status = $data_user->group_status ;
                return view('groups.my_team' , compact('group_id','group_status'));
            }

        }
        else{
            return redirect('preview_team'.'/'.$group_id);
        }

    }

    function preview_team($group_id){

        $data_user = Auth::user();
        $data_groups = Group::where('id' , $group_id)->first();

        if( empty($data_user->group_id) ){
            $group_status = null ;
            return view('groups.preview_team' , compact('group_id' , 'group_status' ,'data_groups'));
        }
        else if( $data_user->group_status == "มีบ้านแล้ว" || $data_user->group_status == "ยืนยันการสร้างบ้านแล้ว" ){
            $group_id = $data_user->group_id;
            return redirect('/group_my_team' .'/'. $group_id);
        }
        else{
            $group_status = $data_user->group_status ;
            return view('groups.preview_team' , compact('group_id' , 'group_status' ,'data_groups'));
        }
    }

    function get_data_groups($type_get_data){

        if($type_get_data == "all"){
            $groups = Group::get();
        }else{
            $groups = Group::where('id' , $type_get_data)->first();
        }

        return $groups;

    }

    function get_data_my_team($group_id){

        $groups = Group::where('id' , $group_id)->first();
        return $groups;
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
            DB::table('users')
                ->where([ 
                        ['id', $user_id],
                    ])
                ->update([
                        'group_status' => 'ยืนยันการสร้างบ้านแล้ว',
                    ]);
        }
       

        return  "success" ;

    }
}
