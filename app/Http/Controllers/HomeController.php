<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use QrCode;
use App\User;
use App\Models\Group;
use App\Models\Activity;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $data_user = Auth::user();

        // return view('teams_qualified');

        if(Auth::user()->role == "Super-admin" || Auth::user()->role == "Admin"){
            // return redirect("groups");
            // $activeGroupsCount = Group::where('active', 'Yes')->count();
            // return view('groups.index' , compact('activeGroupsCount'));

            // return view('pc_points/ranking_by_team');
            // return view('pc_points/end_mission_1');
            return view('pc_points/mission_2');
        }

        else if(Auth::user()->role == "Staff"){
            // return redirect("groups");
            // $activeGroupsCount = Group::where('active', 'Yes')->count();
            // return view('groups.index' , compact('activeGroupsCount'));

            // return view('pc_points/ranking_by_team');
            // return view('pc_points/end_mission_1');
            return view('pc_points/mission_2');
        }

        // else if(Auth::user()->role == "Player" || Auth::user()->role == "Player_OUT"){
        else if(Auth::user()->role == "Player"){
            $data_user = Auth::user();

            // return view('pc_points/ranking_by_team');
            // return view('pc_points/end_mission_1');
            return view('pc_points/mission_2');

            // if( empty($data_user->group_id) && !empty($data_user->time_cf_pay_slip) ){
            //     return redirect('groups');
            // }
            // else if( !empty($data_user->group_id) && $data_user->group_status == "กำลังขอเข้าร่วมบ้าน" ){
            //     return redirect('preview_team'.'/'.$data_user->group_id);
            // }
            // else if( $data_user->group_status == "มีบ้านแล้ว" || $data_user->group_status == "ยืนยันการสร้างบ้านแล้ว"){
            //     return redirect('group_my_team'.'/'.$data_user->group_id);
            // }
            // else{
            //     return redirect('scanner');
            // }

            $check = $data_user->group_status ;
            $validOptions = ["กำลังขอเข้าร่วมบ้าน", "Host Accept", "Host Reject", "Team Ready"];

            if( in_array($check, $validOptions) ){
                return redirect('preview_team'.'/'.$data_user->group_id);
            }else{
                $activeGroupsCount = Group::where('active', 'Yes')->count();
                return view('groups.index' , compact('activeGroupsCount'));
            }
        }

        else if(Auth::user()->role == "QR"){
            // return redirect("admin_scanner");
            return view('admin.scanner');
        }

        else if(Auth::user()->role == "AL"){
            // return redirect("register_tfb2024");
            return view('register_tfb2024');
        }

    }

    function for_scan(Request $request)
    {
        $requestData = $request->all();
        $account = $request->get('account');

        if( !empty($account) ){
            $data_user = User::where('account' , $account)->first();

            if( !empty($data_user->group_id) ){
                return redirect('preview_team'.'/'.$data_user->group_id);
            }
        }

        return redirect('groups');
    }

    function for_Activities(Request $request)
    {
        // https://www.franchisebuilder2024.com/for_Activities?Activities=test_1
        $requestData = $request->all();
        $Activities = $request->get('Activities');

        if( !empty($Activities) ){

            $name_Activities = str_replace("_"," ",$Activities);

            $data_Activities = Activity::where('name_Activities' , $name_Activities)->first();

            if( !empty($data_Activities->id) ){
                return redirect('/scanner'.'?Activities='.$Activities);
            }else{
                return redirect('/home');
            }
        }
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function register_tfb2024(){

        return view('teams_qualified');
        // return view('register_tfb2024');
        
    }

    public function admin_scanner(){
        return view('admin.scanner');
    }
    public function scanner(){

        // return view('teams_qualified');
        return view('scanner');
    }

    function test_qr(Request $request){

        $user = User::get();

        foreach ($user as $item) {
            $url_for_scan = $request->fullUrl() . "/for_scan" ;
            $url_for_scan = str_replace("/var/www/","www.",$url_for_scan);
            // QR-CODE
            $url = "https://chart.googleapis.com/chart?cht=qr&chl=".$url_for_scan."?account=".$item->account."&chs=500x500&choe=UTF-8" ;

            $img = public_path("img/qr_profile" . "/" . $item->account . '.png');
            // Save image
            file_put_contents($img, file_get_contents($url));
        }
    }

    public function user_get_shirt(){
        return view('admin.user_get_shirt');
    }

    function excel_end_mission1(){
        return view('excel_end_mission1');
    }

}
