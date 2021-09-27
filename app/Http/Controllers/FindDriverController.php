<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Order;
use Illuminate\Http\Request;
class FindDriverController extends Controller
{
    public function find(Request $request, $id)
    {
        $checkout = new Checkout();
        $checkout->message = 'Occupied';
        $checkout->orders_id = $request->orders_id;
        $checkout->driver_id = $request->driver_id;
        $checkout->save();
        
        $orders = Order::find($id);
        $orders->status = '1';
        $orders->update();
        return redirect()->route('user.dashboard')->with('success', 'Sedang mencari driver');
    }
}
