<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use Illuminate\Http\Request;

class ComplainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.complain', [
            'title_page' => 'Pengaduan',
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
        $validation = \Validator::make($request->all(), [
            "name" => "required",
            "subject" => "required",
            "description" => "required",
        ])->validate();

        $complain = new Complain();

        $complain->name = $request->get('name');
        $complain->subject = $request->get('subject');
        $complain->description = $request->get('description');

        $complain->save();

        return redirect()->route('complain.index')->with('status', 'Pengaduan Berhasil Dibuat!');
    }
}
