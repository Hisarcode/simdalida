<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        } else if (Auth::user()->roles == 'ADMIN') {
            $proposal = InnovationProposal::where('users_id', Auth::user()->id)->count();
        }

        if (Auth::user()->roles == 'SUPERADMIN') {
            $report = InnovationReport::orderBy('id', 'DESC')->count();
        } else if (Auth::user()->roles == 'ADMIN') {
            $report = InnovationReport::where('users_id', Auth::user()->id)->count();
        }

        return view('pages.admin.dashboard', [
            'proposal' => $proposal,
            'report' => $report
        ]);
    }
}
