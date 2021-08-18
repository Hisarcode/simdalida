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
        public function index()
        {
                $carousel = Carousel::orderBy('id', 'DESC')->get();
                $infographic = InnovationProfile::with(['innovation_proposal'])->orderBy('users_id', 'ASC')->paginate(10);
                $proposal = InnovationProposal::orderBy('id', 'DESC')->where('status', 'SUDAH')->count();
                $user = User::orderBy('id', 'DESC')->where('roles', 'ADMIN')->count();
                $about = About::orderBy('id', 'DESC')->get();
                $complains = Complain::count();

                $video = About::orderBy('id', 'DESC')->get();
                return view('pages.index', [
                        'title_page' => 'Home',
                        'carousel' => $carousel,
                        'infographic' => $infographic,
                        'proposal' => $proposal,
                        'user' => $user,
                        'about' => $about,
                        "complains" => $complains,
                        'video' => $video
                ]);
        }
}
