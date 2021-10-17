<?php

namespace App\Http\Controllers;

use App\Models\Chatting;
use App\Models\RoleUser;
use App\Models\Tracking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChattingController extends Controller
{
    public function chatting($id)
    {
        $tracking = Tracking::find($id);
        $chatting = Chatting::all();
        $driver   = Auth::user();
        $role_driver = RoleUser::where('role_id', '2')->get();
        return view('chat.index', compact('tracking', 'chatting', 'driver', 'role_driver'));
    }
    public function tambah(Request $request, $id)
    {
        $tracking            = Tracking::find($id);
        $cmt                 = new Chatting();
        $cmt->chat           = $request->chat;
        $cmt->user_id        = Auth::id();
        $cmt->track_id    = $tracking->id;
        $cmt->save();
        return back();

    }
}
