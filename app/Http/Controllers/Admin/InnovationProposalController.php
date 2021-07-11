<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InnovationProposal;
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
            $proposal = InnovationProposal::orderBy('id', 'DESC')->get();
        } else if (Auth::user()->roles == 'ADMIN') {
            $proposal = InnovationProposal::where('users_id', Auth::user()->id)->get();
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
        $validation = \Validator::make($request->all(), [
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
        ])->validate();

        $proposal = new InnovationProposal;
        //  ubah time ke zona indo
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
        //
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

        return view('pages.admin.innovation-proposal.edit', [
            'item' => $item
        ]);
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

        \Validator::make($request->all(), [
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
        ])->validate();

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

        return redirect()->route('innovation-proposal.index');
        with('status', 'Data successfully updated');
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
        $item->delete();

        return redirect()->route('innovation-proposal.index');
    }
}
