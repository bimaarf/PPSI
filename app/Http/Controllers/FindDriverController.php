<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\Order;
use Illuminate\Http\Request;
class FindDriverController extends Controller
{
    public function find(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders->status = 'Process';
        $orders->update();
        $checkout = new Checkout();
        $checkout->message   = 'Finded';
        $checkout->orders_id = $orders->id;
      
        $checkout->driver_id = json_encode($request->driver_id);

        foreach(json_decode($checkout->driver_id) as $drvDecode)
        {
            $checkouts = new Checkout();
            $checkouts->message   = 'Finded';
            $checkouts->orders_id = $orders->id;
            $checkouts->driver_id = $drvDecode;
            $checkouts->save();
        }
        
        return back()->with('success', 'Terima kasih, kami akan carikan anda driver.');
    }

   
}
