<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

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
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $groups = Group::where('name_group', 'LIKE', "%$keyword%")
                ->orWhere('member', 'LIKE', "%$keyword%")
                ->orWhere('host', 'LIKE', "%$keyword%")
                ->orWhere('logo', 'LIKE', "%$keyword%")
                ->orWhere('group_line_id', 'LIKE', "%$keyword%")
                ->orWhere('key_invite', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->orWhere('rank_last_week', 'LIKE', "%$keyword%")
                ->orWhere('request_join', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $groups = Group::latest()->paginate($perPage);
        }

        return view('groups.index', compact('groups'));
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

        return view('groups.add_group' , compact('count_group'));
    }

    function create_group($amount){

        $data_old = Group::get();
        $count_group = count($data_old);

        $amount_loop = $amount + $count_group ;

        for ($i=($count_group+1); $i < ($amount_loop+1); $i++) { 
            // code...
            $key_invite = '';

            if ($i <= 9) {
                $name_group = '00'.$i ;
            }else if($i > 9 && $i < 100){
                $name_group = '0'.$i ;
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
                $font->file(public_path('theme_admin/fonts/Prompt/Prompt-Black.ttf'));
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
}
