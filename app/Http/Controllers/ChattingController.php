<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Chatting;
use App\Models\RoleUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChattingController extends Controller
{
    public function chatting($id)
    {
        $checkout = Checkout::find($id);
        $chatting = Chatting::all();
        $driver   = Auth::user();
        $role_driver = RoleUser::where('role_id', '2')->get();
        return view('chat.index', compact('checkout', 'chatting', 'driver', 'role_driver'));
    }
    public function tambah(Request $request, $id)
    {
        $checkout            = Checkout::find($id);
        $cmt                 = new Chatting();
        $cmt->chat           = $request->chat;
        $cmt->checkout_id    = $checkout->id;
        $cmt->user_id        = Auth::id();
        $cmt->save();
        return back()->with('success', 'Komentar ditambahkan');

    }
}
