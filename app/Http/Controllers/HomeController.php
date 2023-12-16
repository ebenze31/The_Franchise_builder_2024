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
            return view('home_page');
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

}
