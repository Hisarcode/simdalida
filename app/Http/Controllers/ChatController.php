<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use Illuminate\Http\Request;
use App\Models\InnovationProposal;
use App\Models\About;
use App\Models\Chat;

class ChatController extends Controller
{

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
            "no_hp" => "required",
            "email" => "required",
            "subject" => "required",
            "description" => "required",
        ])->validate();

        $chat = new Chat();

        $chat->name = $request->get('name');
        $chat->no_hp = $request->get('no_hp');
        $chat->email = $request->get('email');
        $chat->subject = $request->get('subject');
        $chat->description = $request->get('description');
        $chat->save();

        return redirect()->route('home')->with('status', 'Pesan Berhasil Dikirim, kami akan menghubungi anda kembali');
    }
}
