<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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



    public function destroy($id)
    {
        $item = Chat::findOrFail($id);
        $item->delete();

        return redirect()->route('chat-inbox.index')->with('status', 'Deleted successfully!');
    }
}
