<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Contact_staff;
use Illuminate\Http\Request;
use Phattarachai\LineNotify\Line;
use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class Contact_staffController extends Controller
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
            $contact_staff = Contact_staff::where('question', 'LIKE', "%$keyword%")
                ->orWhere('reading', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('staff_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $contact_staff = Contact_staff::latest()->paginate($perPage);
        }

        return view('contact_staff.index', compact('contact_staff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('contact_staff.create');
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
        
        Contact_staff::create($requestData);

        return redirect('contact_staff')->with('flash_message', 'Contact_staff added!');
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
        $contact_staff = Contact_staff::findOrFail($id);

        return view('contact_staff.show', compact('contact_staff'));
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
        $contact_staff = Contact_staff::findOrFail($id);

        return view('contact_staff.edit', compact('contact_staff'));
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
        
        $contact_staff = Contact_staff::findOrFail($id);
        $contact_staff->update($requestData);

        return redirect('contact_staff')->with('flash_message', 'Contact_staff updated!');
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
        Contact_staff::destroy($id);

        return redirect('contact_staff')->with('flash_message', 'Contact_staff deleted!');
    }

    function send_Line_Notify(Request $request){

        $requestData = $request->all();

        $data_user = User::where('id' ,$requestData )->first();

        $team = '-';
        $currentDateTime = Carbon::now();
        $formattedDateTime = $currentDateTime->format('d F Y H:i a');

        if( $data_user->group_status == "มีบ้านแล้ว" || $data_user->group_status == "ยืนยันการสร้างบ้านแล้ว"){
            if( intval($data_user->group_id) < 9 ){
                $team = '0'.$data_user->group_id ;
            }else{
                $team = $data_user->group_id ;
            }
        }

        $message =  "Question request !" . "\n" .
                    "User : " . $data_user->name . "\n" .
                    "ID : " . $data_user->account . "\n" .
                    "Team  : " . $team . "\n" .
                    "Date  : " . $formattedDateTime . "\n\n" .
                    "Question : " . $requestData['question'] . "\n" .
                    "Contact  : " . $requestData['phone'] . "\n" ;

        $line = new Line(env('LINE_NOTIFY_TOKEN'));
        $line->send($message);

        Contact_staff::create($requestData);

        return "success";
    }

    function get_contact_staffs(){

        // $contact_staff = Contact_staff::get();

        $contact_staff = DB::table('contact_staffs')
                ->join('users', 'users.id', '=', 'contact_staffs.user_id')
                ->select('contact_staffs.*', 'users.name as user_name' , 'users.account as user_account' , 'users.phone as user_phone' , 'users.group_id as user_group_id' , 'users.group_status as user_group_status')
                ->orderBy('contact_staffs.created_at' , "DESC")
                ->get();

        return $contact_staff ;
    }
}
