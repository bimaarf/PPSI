<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChattingController extends Controller
{
    public function chatting()
    {
        return view('chat.index');
    }
}
