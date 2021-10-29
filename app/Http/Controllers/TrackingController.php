<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\Tracking;
use App\Models\User;

class TrackingController extends Controller
{
    public function tracking(Request $request, $id)
    {
        $checkout = Checkout::find($id);
        $tracking = Tracking::where('checkout_id', $checkout->id)->get();
        $users   = User::all();
        return view('orders.tracking', compact('checkout', 'tracking', 'users'));
    }
}
