<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\InnovationProposal;
use App\Models\InnovationProfile;
use App\Models\InnovationReport;
use App\Models\Complain;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = User::orderBy('id', 'DESC')->get();
        if (Auth::user()->roles == 'SUPERADMIN') {
            $items = User::with(['inisiator'])->orderBy('id', 'DESC')->get();
        } else if (Auth::user()->roles == 'ADMIN') {
            $items = User::with(['inisiator'])->where('roles', 'OPERATOR')->orderBy('id', 'DESC')->get();
        }
        $proposal = InnovationProposal::where('status', 'SUDAH')->get();

        return view('pages.admin.user.index', [
            'items' => $items,
            'proposal' => $proposal
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.user.create');
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
            "name" => "required|min:5|max:100",
            "username" => "required|min:5|max:20|unique:users",
            "email" => "required|email|unique:users",
            "password" => "required",
            "password_confirmation" => "required|same:password"
        ])->validate();
        $new_user = new \App\Models\User;
        $new_user->name = $request->get('name');
        $new_user->username = $request->get('username');
        $new_user->roles = "ADMIN";
        $new_user->email = $request->get('email');
        $new_user->nik = "-";
        $new_user->inisiator_id = 6;
        $new_user->password_proposal = "password";
        $new_user->password = \Hash::make($request->get('password'));

        $new_user->save();
        return redirect()->route('user.index')->with('status', 'Admin successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = User::find($id);
        return view('pages.admin.user.show', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = User::findOrFail($id);

        return view('pages.admin.user.edit', [
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
        $user = User::findOrFail($id);
        $user->name = $request->get('name');
        $user->username = $request->get('username');
        $user->roles = $request->get('roles');
        $user->save();

        $email = $user->email;

        $data = array('name' => $user->name);

        Mail::send('pages.admin.user.mailuser', $data, function ($message) use ($email) {
            $message->to($email, 'Bapak ibu')->subject('Akses halaman operator Simdalida');
            $message->from(env('MAIL_USERNAME'), 'Admin Simdalida');
        });
        return redirect()->route('user.index')->with('status', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = User::findOrFail($id);
        $item->delete();

        $proposal = InnovationProposal::where('users_id', $id); //hapus proposal yg berkaitan dgn user
        $id_proposal = InnovationProposal::where('users_id', $id)->first()->id;
        $proposal->delete();

        $profile = InnovationProfile::where('users_id', $id); //hapus profile yg berkaitan dgn user
        $profile->delete();


        $report = InnovationReport::where('users_id', $id); //hapus laporan yg berkaitan dgn user
        $report->delete();

        $pengaduan = Complain::where('purpose_innovation', $id_proposal); //hapus pengaduan yg berkaitan dgn user
        $pengaduan->delete();

        return redirect()->route('user.index')->with('status', 'Deleted successfully!');
    }

    public function resetpassword($id)
    {
        $item = User::findOrFail($id);
        $email = User::where('id', $id)->first()->email;
        $name = User::where('id', $id)->first()->name;
        $username = User::where('id', $id)->first()->username;

        $item->password = Hash::make("12345678");
        $item->update();

        $data = array('name' => $name, 'username' => $username);

        Mail::send('pages.admin.user.resetpassword', $data, function ($message) use ($email) {
            $message->to($email, 'Bapak ibu')->subject('Reset Password Akun Simdalida');
            $message->from(env('MAIL_USERNAME'), 'Admin Simdalida');
        });

        return redirect()->route('user.index')->with('status', 'Password successfully reset!');
    }
}
