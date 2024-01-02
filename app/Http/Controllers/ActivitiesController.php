<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Activity;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class ActivitiesController extends Controller
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
            $activities = Activity::where('name_Activities', 'LIKE', "%$keyword%")
                ->orWhere('detail', 'LIKE', "%$keyword%")
                ->orWhere('icon', 'LIKE', "%$keyword%")
                ->orWhere('member', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $activities = Activity::latest()->paginate($perPage);
        }

        return view('activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('activities.create');
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
                if ($request->hasFile('icon')) {
            $requestData['icon'] = $request->file('icon')
                ->store('uploads', 'public');
        }

        $requestData['qr_code'] = $this->create_qr_code($requestData , $request->fullUrl());

        Activity::create($requestData);

        return redirect('activities')->with('flash_message', 'Activity added!');
    }

    function create_qr_code($requestData , $fullUrl)
    {
        $requestData['name_Activities'] = str_replace(" ","_",$requestData['name_Activities']);

        $url_Activities = $fullUrl . "/for_Activities" ;
        $url_Activities = str_replace("/var/www/","",$url_Activities);
        $url_Activities = str_replace("/activities","",$url_Activities);
        // QR-CODE
        $url = "https://chart.googleapis.com/chart?cht=qr&chl=".$url_Activities."?Activities=".$requestData['name_Activities']."&chs=500x500&choe=UTF-8" ;

        $img = public_path("img/qr_Activities" . "/" . $requestData['name_Activities'] . '.png');
        // Save image
        file_put_contents($img, file_get_contents($url));

        $return = $requestData['name_Activities'] . '.png' ;

        return $return ;
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
        $activity = Activity::findOrFail($id);

        return view('activities.show', compact('activity'));
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
        $activity = Activity::findOrFail($id);

        return view('activities.edit', compact('activity'));
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
                if ($request->hasFile('icon')) {
            $requestData['icon'] = $request->file('icon')
                ->store('uploads', 'public');
        }

        $activity = Activity::findOrFail($id);
        $activity->update($requestData);

        return redirect('activities')->with('flash_message', 'Activity updated!');
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
        Activity::destroy($id);

        return redirect('activities')->with('flash_message', 'Activity deleted!');
    }
}
