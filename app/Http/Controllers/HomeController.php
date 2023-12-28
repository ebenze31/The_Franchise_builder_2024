<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use QrCode;
use App\User;

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
        if(Auth::user()->role == "Super-admin" || Auth::user()->role == "Admin"){
            return redirect("dashboard");
        }

        else if(Auth::user()->role == "Player"){
            $data_user = Auth::user();

            if( empty($data_user->group_id) && !empty($data_user->time_cf_pay_slip) ){
                return redirect('groups');
            }
            else if( !empty($data_user->group_id) && $data_user->group_status == "กำลังขอเข้าร่วมบ้าน" ){
                return redirect('preview_team'.'/'.$data_user->group_id);
            }
            else if( $data_user->group_status == "มีบ้านแล้ว" || $data_user->group_status == "ยืนยันการสร้างบ้านแล้ว"){
                return redirect('group_my_team'.'/'.$data_user->group_id);
            }
            else{
                return redirect('scanner');
            }

        }

        else if(Auth::user()->role == "Staff"){
            return redirect("admin_scanner");
        }

        else if(Auth::user()->role == "AL"){
            return redirect("register_tfb2024");
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

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function register_tfb2024(){

        return view('register_tfb2024');
        
    }

    public function admin_scanner(){
        return view('admin.scanner');
    }
    public function scanner(){
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
}
