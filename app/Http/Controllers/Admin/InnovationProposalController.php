<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InnovationProposal;
use App\Models\ReviewProposal;
use App\Models\InnovationReport;
use App\Models\InnovationProfile;
use App\Models\Complain;
use Illuminate\Support\Facades\Auth;

class InnovationProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->roles == 'SUPERADMIN') {
            $proposal = InnovationProposal::orderby('id', 'DESC')->get();
        } else if (Auth::user()->roles == 'OPERATOR') {
            $proposal = InnovationProposal::where('users_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        } else if (Auth::user()->roles == 'ADMIN') {
            $proposal = InnovationProposal::orderby('id', 'DESC')->get();
        }
        return view('pages.admin.innovation-proposal.index', ['proposal' => $proposal]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.innovation-proposal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = \Validator::make(
            $request->all(),
            [
                "users_id" => "required",
                "name" => "required",
                "innovation_step" => "required",
                "innovation_initiator" => "required",
                "innovation_type" => "required",
                "innovation_formats" => "required",
                "is_covid" => "required",
                "innovation_concern" => "required",
                "start_innovation_trial" => "required",
                "end_innovation_trial" => "required",
                "time_innovation_implement" => "required",
                "innovation_design" => "required",
                "innovation_goal" => "required",
                "innovation_benefit" => "required",
                "innovation_result" => "required",
            ],
            [
                "innovation_concern.required" => "Urusan Inovasi Daerah Harus Diisi!",
                "innovation_design.required" => "Rancang Bangun Inovasi Harus Diisi, min 300Kata!",
                "innovation_goal.required" => "Tujuan Inovasi Harus Diisi!",
                "innovation_benefit.required" => "Manfaat Inovasi Harus Diisi!",
                "innovation_result.required" => "Hasil Inovasi Harus Diisi!",
            ]
        )->validate();

        $proposal = new InnovationProposal;
        $proposal->users_id = $request->get('users_id');
        $proposal->name = $request->get('name');
        $proposal->innovation_step = json_encode($request->innovation_step);
        $proposal->innovation_initiator = json_encode($request->innovation_initiator);
        $proposal->innovation_type = $request->get('innovation_type');
        $proposal->innovation_formats = $request->get('innovation_formats');
        $proposal->is_covid = $request->get('is_covid');
        $proposal->innovation_concern = $request->get('innovation_concern');
        $proposal->start_innovation_trial = $request->get('start_innovation_trial');
        $proposal->end_innovation_trial = $request->get('end_innovation_trial');
        $proposal->time_innovation_implement = $request->get('time_innovation_implement');
        $proposal->innovation_design = $request->get('innovation_design');
        $proposal->innovation_goal = $request->get('innovation_goal');
        $proposal->innovation_benefit = $request->get('innovation_benefit');
        $proposal->innovation_result = $request->get('innovation_result');
        $proposal->budget = $request->get('budget');
        $proposal->profil_bisnis = $request->get('profil_bisnis');

        if ($request->file('budget_file')) {
            $file = $request->file('budget_file')->store('proposal/budgetFile', 'public');
            $proposal->budget_file = $file;
        }

        if ($request->file('profil_bisnis_file')) {
            $file = $request->file('profil_bisnis_file')->store('proposal/profilBisnis', 'public');
            $proposal->profil_bisnis_file = $file;
        }

        $proposal->save();

        return redirect()->route('innovation-proposal.index')->with('status', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = InnovationProposal::find($id); //utk show data proposal
        $review = ReviewProposal::where('proposal_id', $id)->first(); //lihat db apakah sudah dibuat reviewnya?
        if (!empty($review)) { //jika ada datanya maka
            $data = $review;
            return view('pages.admin.innovation-proposal.show', [
                'item' => $item,
                'review' => $review,
                'data' => $data
            ]);
        } else {
            $data = 'data tidak ada';
            return view('pages.admin.innovation-proposal.show2', [ //show2 utk blm ada review
                'item' => $item,
                'review' => $review,
                'data' => $data
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = InnovationProposal::findOrFail($id);
        if (Auth::user()->roles == 'SUPERADMIN') {
            return view('pages.admin.innovation-proposal.edit', [
                'item' => $item
            ]);
        }

        if (Auth::user()->roles == 'OPERATOR') {
            if ($item->status == 'BELUM') {
                return view('pages.admin.innovation-proposal.edit', [
                    'item' => $item
                ]);
            } elseif ($item->status == 'SUDAH') {
                return redirect()->route('innovation-proposal.index')->with('status', 'Tidak bisa mengedit data jika proposal sudah di ACC');
            }
        }

        if (Auth::user()->roles == 'ADMIN') {
            return redirect()->route('innovation-proposal.index')->with('status', 'Admin tidak ada akses untuk mengedit proposal. Silahkan tanya Superadmin');
        }
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
        $proposal = InnovationProposal::findOrFail($id);

        \Validator::make(
            $request->all(),
            [
                "name" => "required",
                "innovation_step" => "required",
                "innovation_initiator" => "required",
                "innovation_type" => "required",
                "innovation_formats" => "required",
                "is_covid" => "required",
                "innovation_concern" => "required",
                "start_innovation_trial" => "required",
                "end_innovation_trial" => "required",
                "time_innovation_implement" => "required",
                "innovation_design" => "required|min:300",
                "innovation_goal" => "required",
                "innovation_benefit" => "required",
                "innovation_result" => "required",
            ],
            [
                "innovation_concern.required" => "Urusan Inovasi Daerah Harus Diisi!",
                "innovation_design.required" => "Rancang Bangun Inovasi Harus Diisi, min 300Kata!",
                "innovation_goal.required" => "Tujuan Inovasi Harus Diisi!",
                "innovation_benefit.required" => "Manfaat Inovasi Harus Diisi!",
                "innovation_result.required" => "Hasil Inovasi Harus Diisi!",
            ]
        )->validate();

        $proposal->name = $request->get('name');
        $proposal->innovation_step = json_encode($request->innovation_step);
        $proposal->innovation_initiator = json_encode($request->innovation_initiator);
        $proposal->innovation_type = $request->get('innovation_type');
        $proposal->innovation_formats = $request->get('innovation_formats');
        $proposal->is_covid = $request->get('is_covid');
        $proposal->innovation_concern = $request->get('innovation_concern');
        $proposal->start_innovation_trial = $request->get('start_innovation_trial');
        $proposal->end_innovation_trial = $request->get('end_innovation_trial');
        $proposal->time_innovation_implement = $request->get('time_innovation_implement');
        $proposal->innovation_design = $request->get('innovation_design');
        $proposal->innovation_goal = $request->get('innovation_goal');
        $proposal->innovation_benefit = $request->get('innovation_benefit');
        $proposal->innovation_result = $request->get('innovation_result');
        $proposal->budget = $request->get('budget');
        $proposal->profil_bisnis = $request->get('profil_bisnis');

        if ($request->file('budget_file')) {
            if ($proposal->budget_file && file_exists(storage_path('app/public/' . $proposal->budget_file))) {
                \Storage::delete('public/' . $proposal->budget_file);
            }
            $budget = $request->file('budget_file')->store('proposal/budgetFile', 'public');
            $proposal->budget_file = $budget;
        }

        if ($request->file('profil_bisnis_file')) {
            if ($proposal->profil_bisnis_file && file_exists(storage_path('app/public/' . $proposal->profil_bisnis_file))) {
                \Storage::delete('public/' . $proposal->profil_bisnis_file);
            }
            $bisnis = $request->file('profil_bisnis_file')->store('proposal/profilBisnis', 'public');
            $proposal->profil_bisnis_file = $bisnis;
        }
        $proposal->save();

        return redirect()->route('innovation-proposal.index')->with('status', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = InnovationProposal::findOrFail($id);
        \Storage::delete('public/' . $item->budget_file); //utk hapus file di storage agar tidk penuh
        \Storage::delete('public/' . $item->profil_bisnis_file); //utk hapus file di storage agar tidk penuh
        $item->delete();

        // ----------------------
        $profile = InnovationProfile::where('innovation_proposals_id', $id); //hapus profile yg berkaitan dgn proposal
        $profile->delete();

        $report = InnovationReport::where('innovation_proposals_id', $id); //hapus laporan yg berkaitan dgn proposal
        $report->delete();

        $pengaduan = Complain::where('purpose_innovation', $id); //hapus pengaduan yg berkaitan dgn user
        $pengaduan->delete();

        return redirect()->route('innovation-proposal.index')->with('status', 'Deleted successfully!');
    }

    public function actionedit(Request $request, $id)
    {
        $proposal = InnovationProposal::findOrFail($id);
        $proposal->status = 'SUDAH';
        $proposal->is_review = "2";
        $proposal->update();
        return redirect()->route('innovation-proposal.index')->with('status', 'Updated successfully!');
    }

    public function actioneditt(Request $request, $id)
    {
        $proposal = InnovationProposal::findOrFail($id);
        $proposal->status = 'BELUM';
        $proposal->is_review = "1";
        $proposal->update();
        return redirect()->route('innovation-proposal.index')->with('status', 'Updated successfully!');
    }
}
