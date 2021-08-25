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
                $carousel = Carousel::orderBy('id', 'DESC')->get();
                $infographics = InnovationProfile::with(['innovation_proposal'])->orderBy('users_id', 'ASC')->paginate(10);
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

                $proposal = InnovationProposal::orderBy('id', 'DESC')->where('status', 'SUDAH')->count();
                $user = User::orderBy('id', 'DESC')->where('roles', 'OPERATOR')->count();
                $about = About::orderBy('id', 'DESC')->get();
                $complains = Complain::count();

                $video = About::orderBy('id', 'DESC')->get();
                $terealisasi = InnovationProposal::orderBy('id', 'DESC')->where('status', 'SUDAH')->where('innovation_step', '["Tahap Penerapan"]')->count();

                return view('pages.index', [
                        'title_page' => 'Home',
                        'carousel' => $carousel,
                        'infographic' => $infographics,
                        'proposal' => $proposal,
                        'user' => $user,
                        'about' => $about,
                        "complains" => $complains,
                        'video' => $video,
                        'terealisasi' => $terealisasi
                ]);
        }
}
