<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Pc_point;
use Illuminate\Http\Request;

class Pc_pointsController extends Controller
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
            $pc_points = Pc_point::where('week', 'LIKE', "%$keyword%")
                ->orWhere('pc_point', 'LIKE', "%$keyword%")
                ->orWhere('new_code', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('group_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $pc_points = Pc_point::latest()->paginate($perPage);
        }

        return view('pc_points.index', compact('pc_points'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pc_points.create');
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
        
        Pc_point::create($requestData);

        return redirect('pc_points')->with('flash_message', 'Pc_point added!');
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
        $pc_point = Pc_point::findOrFail($id);

        return view('pc_points.show', compact('pc_point'));
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
        $pc_point = Pc_point::findOrFail($id);

        return view('pc_points.edit', compact('pc_point'));
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
        
        $pc_point = Pc_point::findOrFail($id);
        $pc_point->update($requestData);

        return redirect('pc_points')->with('flash_message', 'Pc_point updated!');
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
        Pc_point::destroy($id);

        return redirect('pc_points')->with('flash_message', 'Pc_point deleted!');
    }
}
