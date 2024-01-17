<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Activities_log;
use App\User;

use App\Models\Activity;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\DB;

class ActivitiesController extends Controller
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
            $activities = Activity::where('name_Activities', 'LIKE', "%$keyword%")
                ->orWhere('detail', 'LIKE', "%$keyword%")
                ->orWhere('icon', 'LIKE', "%$keyword%")
                ->orWhere('member', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $activities = Activity::latest()->paginate($perPage);
        }

        return view('activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('activities.create');
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
                if ($request->hasFile('icon')) {
            $requestData['icon'] = $request->file('icon')
                ->store('uploads', 'public');
        }

        $requestData['qr_code'] = $this->create_qr_code($requestData);

        Activity::create($requestData);

        return redirect('activities')->with('flash_message', 'Activity added!');
    }

    function create_qr_code($requestData )
    {
        $requestData['name_Activities'] = str_replace(" ","_",$requestData['name_Activities']);

        $url_Activities = 'https://www.franchisebuilder2024.com' . "/for_Activities" ;
        $url_Activities = str_replace("/var/www/","",$url_Activities);
        $url_Activities = str_replace("/activities","",$url_Activities);
        // QR-CODE
        $url = "https://chart.googleapis.com/chart?cht=qr&chl=".$url_Activities."?Activities=".$requestData['name_Activities']."&chs=500x500&choe=UTF-8" ;

        $img = public_path("img/qr_Activities" . "/" . $requestData['name_Activities'] . '.png');
        // Save image
        file_put_contents($img, file_get_contents($url));

        $return = $requestData['name_Activities'] . '.png' ;

        return $return ;
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
        $activity = Activity::findOrFail($id);

        return view('activities.show', compact('activity'));
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
        $activity = Activity::findOrFail($id);

        return view('activities.edit', compact('activity'));
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
                if ($request->hasFile('icon')) {
            $requestData['icon'] = $request->file('icon')
                ->store('uploads', 'public');
        }

        $activity = Activity::findOrFail($id);
        $activity->update($requestData);

        return redirect('activities')->with('flash_message', 'Activity updated!');
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
        Activity::destroy($id);

        return redirect('activities')->with('flash_message', 'Activity deleted!');
    }

    function cf_Activities($user_id , $name_Activities){

        $name_Activities = str_replace("_"," ",$name_Activities);
        $dataActivities = Activity::where('name_Activities' , $name_Activities)->first();
        $dataUser = User::where('id' , $user_id)->first();

        $check_old_data = Activities_log::where('id_Activities' ,$dataActivities->id)
            ->where('user_id',$user_id)
            ->first();

        if( !$check_old_data ){

            // สร้าง Activities_log
            $Data = [] ;
            $Data['id_Activities'] = $dataActivities->id;
            $Data['user_id'] = $user_id;
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
                        ['id', $user_id],
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

    function get_detail_activity($id){

        // $data = Activities_log::where('id_Activities' , $id)->get();

        $data = DB::table('users')
            ->join('activities_logs', 'users.id', '=', 'activities_logs.user_id')
            ->select('users.*' , 'activities_logs.created_at as time_join' )
            ->where('activities_logs.id_Activities', $id)
            ->get();

        return $data ;

    }

    function get_activity($name){

        $name = str_replace("_"," ",$name);
        
        $data = Activity::where('name_Activities' , $name)->first();

        return $data ;

    }

    function check_user_join_activity($account , $name_Activity){

        $name_Activity = str_replace("_"," ",$name_Activity);

        $data_Activity = Activity::where('name_Activities' , $name_Activity)->first();
        $Activity_id = $data_Activity->id;
        $Activity_for = $data_Activity->for;

        $data_user = User::where('account' , $account)->first();
        $user_group_status = $data_user->group_status;
        $list_activities = explode(",",$data_user->activities);

        $return = [];
        $return['check'] = 'No';
        $return['name_user'] = '';

        if($Activity_for == 'Team-Ready'){

            if( $user_group_status == 'ยืนยันการสร้างบ้านแล้ว' || $user_group_status == 'Team Ready' ){
                if( in_array($Activity_id, $list_activities) ){
                    $return['check'] = 'joined' ;
                    $return['name_user'] = $data_user->name ;
                }
            }else{
                $return['check'] = 'For Team Ready' ;
                $return['name_user'] = $data_user->name ;
            }

        }
        else{

            if( in_array($Activity_id, $list_activities) ){
                $return['check'] = 'joined' ;
                $return['name_user'] = $data_user->name ;
            }

        }


        return $return ;

    }


    function change_show_staff($id , $status){

        if($status != "Yes"){
            $status = NULL ;
        }

        DB::table('activities')
            ->where([ 
                    ['id', $id],
                ])
            ->update([
                    'show_staff' => $status,
                ]);

        return 'success' ;

    }
}
