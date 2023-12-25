<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
use QrCode;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::id();
        $data = User::findOrFail($id);

        // return view('ProfileUser/Profile' , compact('data') );
        return view("first_profile");

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $id = Auth::id();
        $data = User::findOrFail($id);

        return view('ProfileUser/Profile' , compact('data') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::id() == $id )
        {
            $data = User::findOrFail($id);

            return view('ProfileUser/edit', compact('data'));
            
        }else{
            return view('404');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->all();

        if ($request->hasFile('pay_slip')) {
            $requestData['pay_slip'] = $request->file('pay_slip')->store('uploads', 'public');
        }

        $requestData['status'] = "เข้าร่วมแล้ว" ;
        $requestData['role'] = "Player" ;

        $data = User::findOrFail($id);
        $data->update($requestData);

        // return redirect("register_tfb2024");
        return view("first_profile");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function edit_profile(Request $request, $id)
    {
        // dd($request);
        $requestData = $request->all();

        // Crop ภาพ
        if ($request->hasFile('photo')) {
            $requestData['photo'] = $request->file('photo')->store('uploads', 'public');

            // ตำแหน่งและขนาดของภาพที่คุณต้องการ crop
            $cropX = (int)$requestData['currentX']; // ตำแหน่ง x ที่จะ crop
            $cropY = (int)$requestData['currentY']; // ตำแหน่ง y ที่จะ crop
            $cropWidth = (int)$requestData['currentWidth']; // ขนาดความกว้างที่จะ crop
            $cropHeight = (int)$requestData['currentHeight']; // ขนาดความสูงที่จะ crop

            // เรียกรูปภาพ
            $imagePath = storage_path("app/public")."/".$requestData['photo'];
            $image = Image::make($imagePath);

            // Crop ภาพ
            $image->crop($cropWidth, $cropHeight, $cropX, $cropY);

            // Save ภาพหลังจาก crop
            $image->save($imagePath);

        }
        // END Crop ภาพ
        $data_user = Auth::user();

        if ($requestData['type'] == "first_profile") {
            return redirect('scanner');
        } else {
            return redirect('profile');

        }
        
    }

    function add_account(){
        return view('admin.add_account');
    }

    function create_user(Request $request)
    {
        $requestData = $request->all();
        $data_arr = [];
        
        foreach ($requestData as $item) {
            foreach ($item as $key => $value) {

                if($key == "password"){
                    $data_arr['password'] = Hash::make($value);
                }else{
                    $data_arr[$key] = $value;
                }
            }

            $data_arr['qr_profile'] = $data_arr['account'] . '.png';

            $check_user = User::where('account',$data_arr['account'])->first();

            if( !empty($check_user->account) ){

                if(!empty($check_user->status)){
                    $role = $check_user->role ;
                }else{
                    $role = $data_arr['role'] ;
                }

                DB::table('users')
                    ->where([ 
                            ['account', $data_arr['account']],
                        ])
                    ->update([
                            'password' => $data_arr['password'],
                            'name' => $data_arr['name'],
                            'phone' => $data_arr['phone'],
                            'email' => $data_arr['email'],
                            'role' => $role,
                        ]);
            }else{
                User::create($data_arr);
            }
        }

        return "success" ;

    }

    function create_qr_code(Request $request)
    {
        $requestData = $request->all();
        
        foreach ($requestData as $item) {
            foreach ($item as $key => $value) {
                $data_arr[$key] = $value;
            }

            $check_user = User::where('account',$data_arr['account'])->first();

            if( !empty($check_user->account) ){
                $return = "ไม่สร้าง";
            }else{
                // QR-CODE
                $url = "https://chart.googleapis.com/chart?cht=qr&chl=account=".$data_arr['account']."&chs=500x500&choe=UTF-8" ;

                $img = public_path("img/qr_profile" . "/" . $data_arr['account'] . '.png');
                // Save image
                file_put_contents($img, file_get_contents($url));

                $qr_code = Image::make( $img );
                //logo viicheck
                $logo_icon = Image::make(public_path('img/logo/ALV.DE-78cd6600.png'));
                $logo_icon->resize(80,80);
                $qr_code->insert($logo_icon,'center')->save();

                $return = "สร้าง";
            }
        }

        return $return ;
    }

    function account_all(){
        return view('admin.account_all');
    }

    function get_data_account($type_get_data){

        if($type_get_data == "all"){
            $data = User::where('role' , "aL")
                ->orWhere('role' , "Player")
                ->get();
        }else{
            $data = User::where('account', 'LIKE', "%$type_get_data%")
                ->orWhere('name', 'LIKE', "%$type_get_data%")
                ->orWhere('phone', 'LIKE', "%$type_get_data%")
                ->orWhere('email', 'LIKE', "%$type_get_data%")
                ->orWhere('role', 'LIKE', "%$type_get_data%")
                ->orWhere('status', 'LIKE', "%$type_get_data%")
                ->get();
        }

        return $data;

    }

    function change_status($account , $Staff_id){

        DB::table('users')
            ->where([ 
                    ['account', $account],
                ])
            ->update([
                    'role' => 'Player',
                    'status' => 'เข้าร่วมแล้ว',
                    'staff_pay_slip_id' => $Staff_id,
                    'time_cf_pay_slip' => date("Y-m-d H:i:s"),
                ]);

        return "success" ;

    }

}
