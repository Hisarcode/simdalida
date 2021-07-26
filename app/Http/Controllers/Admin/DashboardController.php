<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complain;
use Illuminate\Http\Request;
use App\Models\InnovationProposal;
use App\Models\InnovationReport;
use App\Models\InnovationProfile;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
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

    public function index(Request $request)
    {

        if (Auth::user()->roles == 'SUPERADMIN') {
            $proposal = InnovationProposal::orderBy('id', 'DESC')->count();
            $report = InnovationReport::orderBy('id', 'DESC')->count();
            $is_improvement = Complain::where('is_improvement', 'belum')->count();
            $current_triwulan = "";
            $notifications = "";
        } else if (Auth::user()->roles == 'ADMIN') {
            $proposal = InnovationProposal::where('users_id', Auth::user()->id)->count();
            $report = InnovationReport::where('users_id', Auth::user()->id)->count();
            $is_improvement = '';
            $current_triwulan = $this->get_current_triwulan();


            $innovation_profiles = InnovationProfile::with(['innovation_proposal'])->where('users_id', Auth::user()->id)->orderBy('id', 'DESC')->get();


            $notification_collection = collect();
            $a = 0;
            foreach ($innovation_profiles as $innovation_profile) {

                for ($quartal_iteration = 1; $quartal_iteration <= $current_triwulan; $quartal_iteration++) {

                    $a = $quartal_iteration;
                    $current_year =  \Carbon\Carbon::now('Asia/Jakarta')->year;

                    $innovation_report = InnovationReport::where('innovation_profiles_id', $innovation_profile->id)->where('report_year', $current_year)->where('quartal', $quartal_iteration)->get();


                    $notification = collect();

                    if (blank($innovation_report)) {
                        $notification->name = $innovation_profile->name;
                        $notification->quartal = $quartal_iteration;
                        $notification->message = "Laporan Triwulan Ke-" . $quartal_iteration . " belum dimasukkan";
                        $notification_collection->push($notification);
                    }

                    $innovation_report = '';
                }
            }

            $notifications = $notification_collection->sortBy([
                ['name', 'asc'],
                ['quartal', 'asc'],
            ])->values()->all();
        }


        return view('pages.admin.dashboard', [
            'proposal' => $proposal,
            'report' => $report,
            'is_improvement' => $is_improvement,
            'notifications' => $notifications,
            'current_triwulan' => $current_triwulan,
        ]);
    }
}
