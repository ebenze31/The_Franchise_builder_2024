<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;

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

        return view('ProfileUser/Profile' , compact('data') );
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
    public function show($id)
    {
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

        if ($request->hasFile('photo')) {
            $requestData['photo'] = $request->file('photo')->store('uploads', 'public');

            // ตำแหน่ง x และ y ที่ได้จากการเลื่อนหรือแตะ
            $newX = $requestData['currentX'];
            $newY = $requestData['currentY'];

            // ตำแหน่งและขนาดของภาพที่คุณต้องการ crop
            $cropX = (int)$newX; // ตำแหน่ง x ที่จะ crop
            $cropY = (int)$newY; // ตำแหน่ง y ที่จะ crop
            $cropWidth = 500; // ขนาดความกว้างที่จะ crop
            $cropHeight = 500; // ขนาดความสูงที่จะ crop

            // crop ภาพ
            $imagePath = storage_path("app/public")."/".$requestData['photo'];
            $image = Image::make($imagePath);

            // $old_w = $image->width();
            // $old_h = $image->height();

            $cropX = ($cropX / $image->width()) * 100;
            $cropY = ($cropY / $image->height()) * 100;

            // if( $old_w > $old_h ){
            //     $image->resize(250, null, function ($constraint) {
            //         $constraint->aspectRatio();
            //     });
            // }else{
            //     $image->resize(null, 250, function ($constraint) {
            //         $constraint->aspectRatio();
            //     });
            // }

            // Crop ภาพ
            $image->crop($cropWidth, $cropHeight, (int)$cropX, (int)$cropY);

            // Save ภาพหลังจาก crop
            // $image->save($imagePath);
            $image->save(storage_path("app/public")."/uploads/111.png");

        }

        echo "<pre>";
        print_r($requestData);
        echo "<pre>";
        exit();

        $data = User::findOrFail($id);
        $data->update($requestData);

        // return redirect('profile')->with('flash_message', 'profile updated!');
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

            User::create($data_arr);
        }

        return "success" ;

    }

    function account_all(){
        return view('admin.account_all');
    }

    function get_data_account($type_get_data){

        if($type_get_data == "all"){
            $data = User::where('role' , "Member")
                ->orWhere('role' , "Challenger")
                ->get();
        }

        return $data;

    }

}
