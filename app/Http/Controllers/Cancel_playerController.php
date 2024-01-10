<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Cancel_player;
use Illuminate\Http\Request;

class Cancel_playerController extends Controller
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
            $cancel_player = Cancel_player::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('shirt_size', 'LIKE', "%$keyword%")
                ->orWhere('time_get_shirt', 'LIKE', "%$keyword%")
                ->orWhere('time_joined', 'LIKE', "%$keyword%")
                ->orWhere('return_shirt', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $cancel_player = Cancel_player::latest()->paginate($perPage);
        }

        return view('cancel_player.index', compact('cancel_player'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('cancel_player.create');
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
        
        Cancel_player::create($requestData);

        return redirect('cancel_player')->with('flash_message', 'Cancel_player added!');
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
        $cancel_player = Cancel_player::findOrFail($id);

        return view('cancel_player.show', compact('cancel_player'));
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
        $cancel_player = Cancel_player::findOrFail($id);

        return view('cancel_player.edit', compact('cancel_player'));
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
        
        $cancel_player = Cancel_player::findOrFail($id);
        $cancel_player->update($requestData);

        return redirect('cancel_player')->with('flash_message', 'Cancel_player updated!');
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
        Cancel_player::destroy($id);

        return redirect('cancel_player')->with('flash_message', 'Cancel_player deleted!');
    }
}
