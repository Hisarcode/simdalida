<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $about = About::find(1);

        return view('pages.admin.about.index', [
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

        return view('pages.admin.about.edit', [
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
            "phone" => "required",
            "email" => "required",
            "facebook" => "required",
            "instagram" => "required",
            "youtube" => "required",
            "whatsapp" => "required",
            "about_content" => "required",
        ])->validate();

        $about->phone = $request->get('phone');
        $about->email = $request->get('email');
        $about->facebook = $request->get('facebook');
        $about->instagram = $request->get('instagram');
        $about->youtube = $request->get('youtube');
        $about->whatsapp = $request->get('whatsapp');
        $about->about_content = $request->get('about_content');

        if ($request->file('about_image')) {
            if ($about->about_image && file_exists(storage_path('app/public/' . $about->about_image))) {
                \Storage::delete('public/' . $about->about_image);
            }
            $about_image_filename = $request->file('about_image')->store('about/', 'public');
            $about->about_image = $about_image_filename;
        }



        $about->save();
        return redirect()->route('about.index')->with('status', 'Data successfully updated');
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
