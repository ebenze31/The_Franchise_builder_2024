<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Intervention\Image\ImageManagerStatic as Image;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
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
            $news = News::where('title', 'LIKE', "%$keyword%")
                ->orWhere('detail', 'LIKE', "%$keyword%")
                ->orWhere('photo_content', 'LIKE', "%$keyword%")
                ->orWhere('photo_cover', 'LIKE', "%$keyword%")
                ->orWhere('link', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $news = News::latest()->paginate($perPage);
        }

        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('news.create');
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

        // dd($requestData);

        if ($request->hasFile('photo_content')) {
            $requestData['photo_content'] = $request->file('photo_content')->store('uploads', 'public');

            // ตำแหน่งและขนาดของภาพที่คุณต้องการ crop
            $photo_content_cropX = (int)$requestData['photo_content_X']; // ตำแหน่ง x ที่จะ crop
            $photo_content_cropY = (int)$requestData['photo_content_Y']; // ตำแหน่ง y ที่จะ crop
            $photo_content_cropWidth = (int)$requestData['photo_content_Width']; // ขนาดความกว้างที่จะ crop
            $photo_content_cropHeight = (int)$requestData['photo_content_Height']; // ขนาดความสูงที่จะ crop

            // เรียกรูปภาพ
            $photo_content_imagePath = storage_path("app/public")."/".$requestData['photo_content'];
            $photo_content_image = Image::make($photo_content_imagePath);
            $photo_content_image->orientate();

            // Crop ภาพ
            $photo_content_image->crop($photo_content_cropWidth, $photo_content_cropHeight, $photo_content_cropX, $photo_content_cropY);

            // Save ภาพหลังจาก crop
            $photo_content_image->save($photo_content_imagePath);

        }


        if ($request->hasFile('photo_cover')) {
            $requestData['photo_cover'] = $request->file('photo_cover')->store('uploads', 'public');

            // ตำแหน่งและขนาดของภาพที่คุณต้องการ crop
            $photo_cover_cropX = (int)$requestData['photo_cover_X']; // ตำแหน่ง x ที่จะ crop
            $photo_cover_cropY = (int)$requestData['photo_cover_Y']; // ตำแหน่ง y ที่จะ crop
            $photo_cover_cropWidth = (int)$requestData['photo_cover_Width']; // ขนาดความกว้างที่จะ crop
            $photo_cover_cropHeight = (int)$requestData['photo_cover_Height']; // ขนาดความสูงที่จะ crop

            // เรียกรูปภาพ
            $photo_cover_imagePath = storage_path("app/public")."/".$requestData['photo_cover'];
            $photo_cover_image = Image::make($photo_cover_imagePath);
            $photo_cover_image->orientate();

            // Crop ภาพ
            $photo_cover_image->crop($photo_cover_cropWidth, $photo_cover_cropHeight, $photo_cover_cropX, $photo_cover_cropY);

            // Save ภาพหลังจาก crop
            $photo_cover_image->save($photo_cover_imagePath);

        }
        // if ($request->hasFile('photo_content')) {
        //     $requestData['photo_content'] = $request->file('photo_content')
        //         ->store('uploads', 'public');
        // }
        // if ($request->hasFile('photo_cover')) {
        //     $requestData['photo_cover'] = $request->file('photo_cover')
        //         ->store('uploads', 'public');
        // }

        News::create($requestData);

        return redirect('add_news')->with('flash_message', 'News added!');
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
        $news = News::findOrFail($id);

        return view('news.show', compact('news'));
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
        $news = News::findOrFail($id);

        return view('news.edit', compact('news'));
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
                if ($request->hasFile('photo_content')) {
            $requestData['photo_content'] = $request->file('photo_content')
                ->store('uploads', 'public');
        }
        if ($request->hasFile('photo_cover')) {
            $requestData['photo_cover'] = $request->file('photo_cover')
                ->store('uploads', 'public');
        }

        $news = News::findOrFail($id);
        $news->update($requestData);

        return redirect('news')->with('flash_message', 'News updated!');
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
        News::destroy($id);

        return redirect('news')->with('flash_message', 'News deleted!');
    }

    function add_news(){
        return view('news.add_news');
    }
}
