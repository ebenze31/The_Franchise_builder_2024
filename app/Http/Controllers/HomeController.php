<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

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

        else if(Auth::user()->role == "Player" || Auth::user()->role == "Staff"){
            $data_user = Auth::user();

            if( empty($data_user->group_id) && !empty($data_user->time_cf_pay_slip) ){
                return redirect('groups');
            }
            else if( !empty($data_user->group_id) && $data_user->group_status == "กำลังขอเข้าร่วมบ้าน" ){
                return redirect('preview_team'.'/'.$data_user->group_id);
            }
            else{
                return redirect('scanner');
            }

        }

        else if(Auth::user()->role == "AL"){
            return redirect("register_tfb2024");
        }

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
}
