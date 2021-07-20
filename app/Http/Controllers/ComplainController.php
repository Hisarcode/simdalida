<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use Illuminate\Http\Request;
use App\Models\InnovationProposal;

class ComplainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $innovation = InnovationProposal::where('status', 'SUDAH')->get();
        return view('pages.complain', [
            'title_page' => 'Pengaduan',
            'innovation' => $innovation
        ]);
    }

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
            "name" => "required",
            "subject" => "required",
            "description" => "required",
            "purpose_innovation" => "required"
        ])->validate();

        $complain = new Complain();

        $complain->name = $request->get('name');
        $complain->subject = $request->get('subject');
        $complain->description = $request->get('description');
        $complain->purpose_innovation = $request->get('purpose_innovation');
        $complain->is_improvement = "belum";
        $sekarang = \Carbon\Carbon::now('Asia/Jakarta');
        $tambah = (new \Carbon\Carbon($sekarang))->addDays('3');
        $complain->end_time = $tambah;


        $complain->save();

        return redirect()->route('complain.index')->with('status', 'Pengaduan Berhasil Dibuat!');
    }
}
