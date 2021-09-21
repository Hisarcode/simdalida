<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $about = About::find(1);

        return view('pages.admin.video.index', [
            'about' => $about,
        ]);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = About::findOrFail($id);

        return view('pages.admin.video.edit', [
            'item' => $item
        ]);
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
        $about = About::findOrFail($id);

        \Validator::make($request->all(), [
            "video" => "required",
            "thumbnail" => "mimes:jpeg,png,jpg,svg|max:3072"
        ])->validate();

        $about->video = $request->get('video');

        if ($request->file('thumbnail')) {
            if ($about->thumbnail && file_exists(storage_path('app/public/' . $about->thumbnail))) {
                \Storage::delete('public/' . $about->thumbnail);
            }
            $thumbnail_filename = $request->file('thumbnail')->store('about/', 'public');
            $about->thumbnail = $thumbnail_filename;
        }



        $about->save();
        return redirect()->route('video.index')->with('status', 'Data successfully updated');
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
}
