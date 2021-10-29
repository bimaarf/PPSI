<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Order;
use App\Models\Tracking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class FindDriverController extends Controller
{
    public function find(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders->status = '1';
        $orders->update();
        $checkout = new Checkout();
        $checkout->message   = $request->message;
        $checkout->orders_id = $request->orders_id;
        $checkout->driver_id = json_encode($request->driver_id);

        foreach(json_decode($checkout->driver_id) as $drvDecode)
        {
            $checkouts = new Checkout();
            $checkouts->message   = $request->message;
            $checkouts->orders_id = $request->orders_id;
            $checkouts->driver_id = $drvDecode;
            $checkouts->save();
        }
        
        return redirect()->route('user.index')->with('success', 'Sedang mencari driver');
    }

    public function update(Request $request, $id)
    {
        $checkout = Checkout::find($id);
        $checkout->message = 'Canceled';
        // $checkout->driver_id = json_encode($request->driver_id);
        $checkout->update();
        return redirect()->route('driver.index')->with('success', 'Sedang mencari driver');
    }
}
