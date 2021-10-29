<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\FeedManager;
use App\Models\Checkout;
use Illuminate\Http\Request;
class ShipperController extends Controller
{
    public function dashboard()
    {
        // shipper
        $orders = Order::orderBy('id', 'ASC')->simplePaginate(10);
        // driver
        $checkout = Checkout::orderBy('id', 'ASC')->simplePaginate(10);
        // feed manager
        $feed_manager = FeedManager::orderBy('id', 'ASC')->simplePaginate(10);
        
        return view("user.index", compact('orders', 'checkout', 'feed_manager'));
    }

    public function konfirmasiBarang($id)
    {
        $orders = Order::find($id);
        $orders->status = '6';
        $orders->update();
        return redirect()->route('user.index')->with('success', 'Barang diterima');
    }
}
