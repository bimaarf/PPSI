<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\FeedManager;
use App\Models\Checkout;
use App\Models\TrackingStatus;
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
        $status = TrackingStatus::find($id);
        $status->status = 'Konfirmasi';
        $status->update();

        return back()->with('success', 'Barang diterima');
    }
}
