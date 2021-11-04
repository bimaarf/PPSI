<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\Order;
use App\Models\Tracking;
use App\Models\TrackingStatus;
use App\Models\User;

class TrackingController extends Controller
{
    public function tracking(Request $request, $id)
    {
        $orders = Order::find($id);
        $checkout = Checkout::all();
        $tracking = Tracking::orderBy('id', 'ASC')->get();
        $track_status = TrackingStatus::orderBy('id', 'DESC')->get();
        $users   = User::all();
        return view('orders.tracking', compact('checkout', 'orders', 'tracking', 'users', 'track_status'));
    }
    
}
