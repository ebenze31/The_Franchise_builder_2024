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
            return view('groups.index');
        }else{
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

            // สร้างรูปกลุ่ม
            $image = Image::make(public_path('img/bg_group/theme/bg_group.png'));

            // แทรกตัวอักษรลงในภาพ
            $image->text($name_group, 125, 125, function($font) {
                $font->file(public_path('theme_admin/fonts/Font/Font/Allianz_Neo_webfonts/ttf/AllianzNeoW01-Bold.ttf'));
                $font->size(100);
                $font->color('#ffffff');
                $font->align('center');
                $font->valign('middle');
            });

            // บันทึกภาพใหม่
            $image->save(public_path('img/bg_group/logo_group/bg_group_'.$name_group.'.png'));

            $requestData['logo'] = 'img/bg_group/logo_group/bg_group_'.$name_group.'.png' ;

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
        }else if($data_user->group_id != $group_id){
            $group_id = $data_user->group_id;
            return redirect('/group_my_team' .'/'. $group_id);
        }else{
            return view('groups.my_team' , compact('group_id'));
        }

    }

    function preview_team($group_id){

        $data_user = Auth::user();

        if( empty($data_user->group_id) ){
            return view('groups.preview_team' , compact('group_id'));
        }else{
            $group_id = $data_user->group_id;
            return redirect('/group_my_team' .'/'. $group_id);
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
                ]);
        }else{

        }


        DB::table('users')
            ->where([ 
                    ['id', $user_id],
                ])
            ->update([
                    'group_id' => $group_id,
                    'group_status' => "มีบ้านแล้ว",
                ]);

        return  $user_id ;
    }
}
