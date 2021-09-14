<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;

class ChatInboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chats = Chat::orderBy('id', 'DESC')->get();

        return view('pages.admin.chat-inbox.index', compact('chats'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Chat::find($id);
        return view('pages.admin.chat-inbox.show', ['item' => $item]);
    }

    public function edit($id)
    {
        $item = Chat::findOrFail($id);

        return view('pages.admin.chat-inbox.edit', [
            'item' => $item
        ]);
    }

    public function update(Request $request, $id)
    {
        $chat = Chat::findOrFail($id);

        \Validator::make($request->all(), [
            "reply" => "required"
        ])->validate();
        $chat->reply = $request->get('reply');
        $chat->email = $request->get('email');
        $chat->name = $request->get('name');
        $chat->subject = $request->get('subject');
        $chat->description = $request->get('description');
        $chat->update();

        $email = $chat->email;


        $data = array('name' => $chat->name, 'reply' => $chat->reply, 'subject' => $chat->subject, 'description' => $chat->description);

        // Mail::send('pages.admin.chat-inbox.mail', $data, function ($message) use ($email) {
        //     $message->to($email, 'Bapak/ibu')->subject('Balas Pesan Dari Simdalida');
        //     $message->from('mail.sanggau.go.id ', 'Admin Simdalida');
        // });

        Mail::send('pages.admin.chat-inbox.mail', $data, function ($message) use ($email) {
            $message->to($email, 'Bapak/ibu')->subject('Balasan Pesan Dari Simdalida');
            $message->from(env('MAIL_USERNAME'), 'Admin Simdalida');
        });

        return redirect()->route('chat-inbox.index')->with('status', 'Pesan Berhasil Dikirim');
    }



    public function destroy($id)
    {
        $item = Chat::findOrFail($id);
        $item->delete();

        return redirect()->route('chat-inbox.index')->with('status', 'Deleted successfully!');
    }

    public function balas($id)
    {
        $item = Chat::find($id);
        return view('pages.admin.chat-inbox.balas', ['item' => $item]);
    }
}
