<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\Order;
use App\Models\Tracking;
use App\Models\TrackingStatus;
use App\Models\User;
use App\Models\Chatting;
use Illuminate\Support\Facades\Auth;
use App\Models\RoleUser;

class TrackingController extends Controller
{
    public function tracking(Request $request, $id)
    {
        $orders = Order::find($id);
        $checkout = Checkout::all();
        $tracking = Tracking::orderBy('id', 'ASC')->get();
        $track_status = TrackingStatus::orderBy('id', 'ASC')->get();
        $users   = User::all();
        // chatting
        $chatting = Chatting::all();
        $driver   = Auth::user();
        $role_driver = RoleUser::where('role_id', '2')->get();

        return view('orders.tracking', compact('checkout', 'orders', 'tracking', 'users', 'track_status', 'chatting', 'driver', 'role_driver'));
    }
    
}
