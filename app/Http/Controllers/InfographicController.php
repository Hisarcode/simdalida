<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InnovationProfile;
use App\Models\About;
use App\Models\InnovationReport;

class InfographicController extends Controller
{
    /**
     * Count the period of now.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_current_triwulan()
    {
        // check hari ini masuk periode apa berdasarkan bulan
        $current_month = \Carbon\Carbon::now('Asia/Jakarta')->month;
        if ($current_month >= 1 && $current_month <= 3) {
            $current_triwulan = 1;
        } elseif ($current_month >= 4 && $current_month <= 6) {
            $current_triwulan = 2;
        } elseif ($current_month >= 7 && $current_month <= 9) {
            $current_triwulan = 3;
        } elseif ($current_month >= 10 && $current_month <= 12) {
            $current_triwulan = 4;
        }

        return $current_triwulan;
    }

    public function index()
    {
        $infographics = InnovationProfile::with(['innovation_proposal'])->orderBy('users_id', 'ASC')->get();
        $about = About::orderBy('id', 'DESC')->get();
        $current_year =  \Carbon\Carbon::now('Asia/Jakarta')->year;
        $current_triwulan = $this->get_current_triwulan();


        foreach ($infographics as $infographic) {

            $innovation_report = InnovationReport::where('innovation_proposals_id', $infographic->innovation_proposals_id)
                ->where('report_year', $current_year)->count();

            // dd($current_triwulan);

            if ($innovation_report < $current_triwulan) {
                $infographic->sign = 0;
            } else {
                $infographic->sign = 1;
            }
        }

        return view('pages.infographic', [
            'title_page' => 'Infografis',
            'infographic' => $infographics,
            'about' => $about
        ]);
    }

    public function show(Request $request, $id)
    {
        $infographic = InnovationProfile::with(['innovation_proposal'])
            ->where('id', $id)
            ->firstOrFail();

        $about = About::orderBy('id', 'DESC')->get();

        $title_page = InnovationProfile::where('id', $id)->first()->innovation_proposal->name;
        $post = InnovationProfile::with(['innovation_proposal'])->get()->take(1);

        return view('pages.infographicdetail', compact('infographic', 'title_page', 'post', 'about'));
    }
}
