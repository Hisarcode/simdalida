<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\InnovationProfile;

class InfographicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infographic = InnovationProfile::with(['innovation_proposal'])->orderBy('id', 'DESC')->get();

        return view('pages.admin.infographic-content.index')
            ->with('infographic', $infographic);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        return view('pages.admin.infographic-content.show', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    public function editinfographic(Request $request, $id)
    {
        $profile = InnovationProfile::findOrFail($id);
        $profile->is_published = 'YES';
        $profile->update();
        return redirect()->route('infographic-content.index')->with('status', 'Updated successfully!');
    }

    public function editinfographicc(Request $request, $id)
    {
        $profile = InnovationProfile::findOrFail($id);
        $profile->is_published = 'NO';
        $profile->update();
        return redirect()->route('infographic-content.index')->with('status', 'Updated successfully!');
    }
}
