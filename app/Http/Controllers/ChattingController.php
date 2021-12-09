<?php

namespace App\Http\Controllers;

use App\Models\Chatting;
use App\Models\Order;
use App\Models\RoleUser;
use App\Models\Tracking;
use App\Models\Checkout;
use App\Models\TrackingStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChattingController extends Controller
{
    
    public function read(Request $request, $id)
    {
        $checkout = Checkout::orderBy('id', 'ASC')->get();
        $tracking = Tracking::find($id);
        $track_status = TrackingStatus::orderBy('id', 'ASC')->get();
        $users   = User::all();
        // chatting
        $chatting = Chatting::where('track_id', $tracking->id)->get();

        $driver   = Auth::user();
        $role_driver = RoleUser::where('role_id', '2')->get();

        return view('orders.modal.elements.read', compact('checkout','tracking', 'users', 'track_status', 'chatting', 'driver', 'role_driver'));
    }
    public function tambah(Request $request, $id)
    {
        $tracking            = Tracking::find($id);
        $cmt                 = new Chatting();
        $cmt->chat           = $request->chat;
        $cmt->user_id        = Auth::id();
        $cmt->track_id       = $tracking->id;
        $cmt->save();
        return back();

    }
    public function store(Request $request)
    {
        $data['chat']       = $request->chat;
        $data['user_id']    = Auth::id();
        $data['track_id']   = $request->track_id;
        Chatting::insert($data);
    }
}
