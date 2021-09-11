<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReviewProposal;
use App\Models\InnovationProposal;
use App\Models\User;

class ReviewProposalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            "user_create_id" => "required",
            "user_review_id" => "required",
            "proposal_id" => "required",
        ])->validate();

        $review = new ReviewProposal();
        $review->user_create_id = $request->get('user_create_id');
        $review->user_review_id = $request->get('user_review_id');
        $review->proposal_id = $request->get('proposal_id');
        $review->name = $request->get('name');
        $review->innovation_step = $request->get('innovation_step');
        $review->innovation_initiator = $request->get('innovation_initiator');
        $review->innovation_type = $request->get('innovation_type');
        $review->innovation_formats = $request->get('innovation_formats');
        $review->is_covid = $request->get('is_covid');
        $review->innovation_concern = $request->get('innovation_concern');
        $review->start_innovation_trial = $request->get('start_innovation_trial');
        $review->time_innovation_implement = $request->get('time_innovation_implement');
        $review->innovation_design = $request->get('innovation_design');
        $review->innovation_goal = $request->get('innovation_goal');
        $review->innovation_benefit = $request->get('innovation_benefit');
        $review->innovation_result = $request->get('innovation_result');
        $review->budget = $request->get('budget');
        $review->profil_bisnis = $request->get('profil_bisnis');

        $review->save();

        return redirect()->route('innovation-proposal.index')->with('status', 'Review Berhasil Dibuat!');
    }

    public function simpan(Request $request, $id)
    {
        $proposal = InnovationProposal::findOrFail($id);
        $proposal->is_review = "1";
        $proposal->save();

        $validation = \Validator::make($request->all(), [
            "user_create_id" => "required",
            "user_review_id" => "required",
            "proposal_id" => "required",
        ])->validate();

        $review = new ReviewProposal();
        $review->user_create_id = $request->get('user_create_id');
        $review->user_review_id = $request->get('user_review_id');
        $review->proposal_id = $request->get('proposal_id');
        $review->name = $request->get('name');
        $review->innovation_step = $request->get('innovation_step');
        $review->innovation_initiator = $request->get('innovation_initiator');
        $review->innovation_type = $request->get('innovation_type');
        $review->innovation_formats = $request->get('innovation_formats');
        $review->is_covid = $request->get('is_covid');
        $review->innovation_concern = $request->get('innovation_concern');
        $review->start_innovation_trial = $request->get('start_innovation_trial');
        $review->time_innovation_implement = $request->get('time_innovation_implement');
        $review->innovation_design = $request->get('innovation_design');
        $review->innovation_goal = $request->get('innovation_goal');
        $review->innovation_benefit = $request->get('innovation_benefit');
        $review->innovation_result = $request->get('innovation_result');
        $review->budget = $request->get('budget');
        $review->profil_bisnis = $request->get('profil_bisnis');

        $review->save();

        return redirect()->route('innovation-proposal.index')->with('status', 'Review Berhasil Dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = InnovationProposal::find($id);
        return view('pages.admin.review-proposal.create', [
            'item' => $item,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = InnovationProposal::find($id); //utk show data proposal
        $review = ReviewProposal::where('proposal_id', $id)->first();
        return view('pages.admin.review-proposal.edit', [
            'item' => $item,
            'review' => $review,
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
        $review = ReviewProposal::findOrFail($id);
        $review1 = ReviewProposal::where('id', $id)->first();
        $ambilid = $review1->proposal_id; //utk nangkap id dari proposal di tabel review

        $review->name = $request->get('name');
        $review->innovation_step = $request->get('innovation_step');
        $review->innovation_initiator = $request->get('innovation_initiator');
        $review->innovation_type = $request->get('innovation_type');
        $review->innovation_formats = $request->get('innovation_formats');
        $review->is_covid = $request->get('is_covid');
        $review->innovation_concern = $request->get('innovation_concern');
        $review->start_innovation_trial = $request->get('start_innovation_trial');
        $review->time_innovation_implement = $request->get('time_innovation_implement');
        $review->innovation_design = $request->get('innovation_design');
        $review->innovation_goal = $request->get('innovation_goal');
        $review->innovation_benefit = $request->get('innovation_benefit');
        $review->innovation_result = $request->get('innovation_result');
        $review->budget = $request->get('budget');
        $review->profil_bisnis = $request->get('profil_bisnis');

        $review->save();

        $proposal = InnovationProposal::where('id', $ambilid)->first();
        $proposal->is_review = "1";
        $proposal->save();

        return redirect()->route('innovation-proposal.index')->with('status', 'Review Data Berhasil diUpdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
