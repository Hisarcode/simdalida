<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Complain;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        if (Auth::user()->roles == 'SUPERADMIN') {
            $complains = Complain::with(['innovation_complain'])->orderBy('id', 'DESC')->get();
        } else if (Auth::user()->roles == 'ADMIN') {
            $complains = Complain::with(['innovation_complain'])->orderBy('id', 'DESC')->get();
        }

        return view('pages.admin.complain-inbox.index', compact('complains'));
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $item = Complain::findOrFail($id);

        return view('pages.admin.complain-inbox.edit', [
            'item' => $item
        ]);
    }

    public function update(Request $request, $id)
    {
        $complain = Complain::findOrFail($id);
        \Validator::make(
            $request->all(),
            [
                "bukti_tl" => "required|mimes:doc,pdf,docx|max:5240",
            ],
            [
                "bukti_tl.mimes" => "type file harus PDF/docx!",
            ]
        )->validate();
        $complain->is_improvement = 'sudah';
        if ($request->file('bukti_tl')) {
            $bukti = $request->file('bukti_tl')->store('pengaduan/bukti_tl', 'public');
            $complain->bukti_tl = $bukti;
        }

        $complain->update();
        return redirect()->route('complain-inbox.index')->with('status', 'Status Pengaduan Berhasil Diperbarui');
    }

    public function destroy($id)
    {
        $item = Complain::findOrFail($id);
        $item->delete();

        return redirect()->route('complain-inbox.index')->with('status', 'Deleted successfully!');
    }
}
