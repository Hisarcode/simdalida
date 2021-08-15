<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InnovationProfile;
use App\Models\About;

class InfographicController extends Controller
{
    public function index()
    {
        $infographic = InnovationProfile::with(['innovation_proposal'])->orderBy('users_id', 'ASC')->get();
        $about = About::orderBy('id', 'DESC')->get();

        return view('pages.infographic', [
            'title_page' => 'Infografis',
            'infographic' => $infographic,
            'about' => $about
        ]);
    }

    public function show(Request $request, $id)
    {
        $infographic = InnovationProfile::with(['innovation_proposal'])
            ->where('id', $id)
            ->firstOrFail();

        $about = About::orderBy('id', 'DESC')->get();

        $title_page = InnovationProfile::where('id', $id)->first()->name;

        $post = InnovationProfile::with(['innovation_proposal'])->get()->random(4);

        return view('pages.infographicdetail', compact('infographic', 'title_page', 'post', 'about'));
    }
}
