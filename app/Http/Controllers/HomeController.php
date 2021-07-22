<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $carousel = Carousel::orderBy('id', 'DESC')->get();

        return view('pages.index', [
            'title_page' => 'Home',
            'carousel' => $carousel
        ]);
    }
}
