<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousel;
use App\Models\InnovationProfile;
use App\Models\InnovationProposal;
use App\Models\User;
use App\Models\About;
use App\Models\Complain;
use App\Models\InnovationReport;

class VideoGalleryController extends Controller
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

        $report = InnovationProfile::whereNotNull('kualitas_inovasi_file')->orderBy('users_id', 'DESC')->paginate(9);

        $about = About::orderBy('id', 'DESC')->get();

        return view('pages.videogallery', [
            'title_page' => 'Video Simdalida',
            'report' => $report,
            'about' => $about
        ]);
    }

    public function show(Request $request, $id)
    {
        $video = InnovationProfile::where('id', $id)
            ->firstOrFail();

        $about = About::orderBy('id', 'DESC')->get();

        $title_page = InnovationProfile::where('id', $id)->first()->innovation_proposal->name;


        return view('pages.videogallerydetail', compact('video', 'title_page', 'about'));
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table pegawai sesuai pencarian data
        $report = InnovationProfile::whereNotNull('kualitas_inovasi_file')->where('name', 'like', "%" . $cari . "%")
            ->paginate(9);

        $about = About::orderBy('id', 'DESC')->get();

        return view('pages.videogallery', [
            'title_page' => 'Video Simdalida',
            'report' => $report,
            'about' => $about
        ]);
    }
}
