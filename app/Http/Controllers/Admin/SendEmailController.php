<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    public function index()
    {

        Mail::to("fikrihanif77@gmail.com")->send(new SendEmail());

        return view('pages.admin.chat-inbox.index');
    }
}
