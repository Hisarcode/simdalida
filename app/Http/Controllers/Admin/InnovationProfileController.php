<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InnovationProfile;
use App\Models\InnovationProposal;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class InnovationProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->roles == 'SUPERADMIN') {
            $profile = InnovationProfile::with(['innovation_proposal'])->orderBy('users_id', 'ASC')->get();
        } else if (Auth::user()->roles == 'ADMIN') {
            $profile = InnovationProfile::with(['innovation_proposal'])->orderBy('users_id', 'ASC')->get();
        } else if (Auth::user()->roles == 'OPERATOR') {
            $profile = InnovationProfile::with(['innovation_proposal'])->where('users_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        }
        return view('pages.admin.innovation-profile.index')
            ->with('profile', $profile);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $innovation_proposals = InnovationProposal::where('users_id', Auth::user()->id)->where('status', 'SUDAH')->get();
        return view('pages.admin.innovation-profile.create', [
            'innovation_proposals' => $innovation_proposals
        ]);
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
                "description" => "required",
                "innovation_proposals_id" => [
                    "required",
                    "unique:innovation_profiles,innovation_proposals_id"
                ],
            ],
            [
                "innovation_proposals_id.unique" => "Profil Inovasi tersebut sudah ada silahkan gunakan edit data untuk merubah data Inovasi tersebut"
            ]
        )->validate();

        $profile = new InnovationProfile;
        $ambil = InnovationProposal::where('id', $request->get('innovation_proposals_id'))->first()->name;

        $profile->users_id = $request->get('users_id');
        $profile->name = $ambil;
        $profile->description = $request->get('description');
        $profile->innovation_proposals_id = $request->get('innovation_proposals_id');

        if ($request->file("image")) {
            $image = $request->file('image')->store('profile', 'public');
            $profile->image = $image;
        };

        $profile->save();

        return redirect()->route('innovation-profile.index')->with('status', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = InnovationProfile::find($id);
        return view('pages.admin.innovation-profile.show', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = InnovationProfile::findOrFail($id);
        $innovation_proposals = InnovationProposal::where('users_id', Auth::user()->id)->where('status', 'SUDAH')->get();

        return view('pages.admin.innovation-profile.edit', [
            'item' => $item,
            'innovation_proposals' => $innovation_proposals
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
        $profile = InnovationProfile::findOrFail($id);

        \Validator::make($request->all(), [
            "description" => "required",

        ])->validate();

        $profile->description = $request->get('description');

        if ($request->file('image')) {
            if ($profile->image && file_exists(storage_path('app/public/' . $profile->image))) {
                \Storage::delete('public' . $profile->image);
            }
            $image = $request->file('image')->store('profile', 'public');
            $profile->image = $image;
        }
        $profile->save();

        return redirect()->route('innovation-profile.index')->with('status', 'Data successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = InnovationProfile::findOrFail($id);
        $item->delete();

        return redirect()->route('innovation-profile.index')->with('status', 'Deleted successfully!');
    }
}
