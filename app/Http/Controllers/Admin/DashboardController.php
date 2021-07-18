<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complain;
use Illuminate\Http\Request;
use App\Models\InnovationProposal;
use App\Models\InnovationReport;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        if (Auth::user()->roles == 'SUPERADMIN') {
            $proposal = InnovationProposal::orderBy('id', 'DESC')->count();
            $report = InnovationReport::orderBy('id', 'DESC')->count();
            $is_improvement = Complain::where('is_improvement', 'belum')->count();
        } else if (Auth::user()->roles == 'ADMIN') {
            $proposal = InnovationProposal::where('users_id', Auth::user()->id)->count();
            $report = InnovationReport::where('users_id', Auth::user()->id)->count();
            $is_improvement = '';
        }

        return view('pages.admin.dashboard', [
            'proposal' => $proposal,
            'report' => $report,
            'is_improvement' => $is_improvement,
        ]);
    }
}
