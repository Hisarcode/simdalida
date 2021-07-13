<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complain;
use Illuminate\Http\Request;

class ComplainInboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complains = Complain::orderBy('id', 'DESC')->get();
        return view('pages.admin.complain-inbox.index', ['complains' => $complains]);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Complain::find($id);
        return view('pages.admin.complain-inbox.show', ['item' => $item]);
    }
}
