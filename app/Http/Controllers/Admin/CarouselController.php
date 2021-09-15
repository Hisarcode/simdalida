<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Carousel;
use Illuminate\Http\Request;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carousels = Carousel::orderBy('id', 'DESC')->get();

        return view('pages.admin.carousel.index', compact('carousels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.carousel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = \Validator::make($request->all(), [
            "title" => "required",
            "description" => "required",
            "carousel_image" => "required|mimes:jpeg,png,jpg,svg|max:3072",
        ])->validate();

        $carousel = new Carousel();

        $carousel->title = $request->get('title');
        $carousel->description = $request->get('description');

        if ($request->file("carousel_image")) {
            $carousel_image_file = $request->file('carousel_image')->store('carousel', 'public');
            $carousel->carousel_image = $carousel_image_file;
        };

        $carousel->save();

        return redirect()->route('carousel.index')->with('status', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Carousel::find($id);
        return view('pages.admin.carousel.show', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Carousel::findOrFail($id);

        return view('pages.admin.carousel.edit', ['item' => $item]);
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
        $carousel = Carousel::findOrFail($id);

        \Validator::make($request->all(), [
            "title" => "required",
            "description" => "required",
            "carousel_image" => "mimes:jpeg,png,jpg,svg|max:3072",
        ]);
        $carousel->title = $request->get('title');
        $carousel->description = $request->get('description');

        if ($request->file('carousel_image')) {
            if ($carousel->carousel_image && file_exists(storage_path('app/public/' . $carousel->carousel_image))) {
                \Storage::delete('public' . $carousel->carousel_image);
            }
            $carousel_image_file = $request->file('carousel_image')->store('carousel', 'public');
            $carousel->carousel_image = $carousel_image_file;
        }

        $carousel->save();

        return redirect()->route('carousel.index')->with('status', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Carousel::findOrfail($id);

        \Storage::delete('public' . $item->carousel_image);
        $item->delete();

        return redirect()->route('carousel.index');
    }
}
