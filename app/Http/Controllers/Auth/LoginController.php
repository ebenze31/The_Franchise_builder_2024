<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Log;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    // protected function redirectTo()
    // {
    //     if(Auth::user()->role == "admin"){
    //         return redirect("dashboard");
    //     }else{
    //         return redirect("/");
    //     }
    // }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'account'; // กำหนดให้ใช้ 'account' แทน 'email'
    }

    public function login(Request $request)
    {
        $credentials = $request->only('account', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...

            $data_user = Auth::user();

            Log::create([
                "log_content"=> 'Log in',
                "user_id"=> $data_user->id,
                "role"=> $data_user->role,
            ]);
           
            return redirect("home");
        }

        return redirect('login')->with('error', 'Login failed, please check your credentials.');
    }

}
