<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class DriverController extends Controller
{
    public function deleteCheckout($id)
    {
        $orders = Order::find($id);
        $orders->status = null;
        $checkout = Checkout::where('orders_id', $orders->id)->get();
        foreach ($checkout as $checkouts) {
            $checkouts->delete();
        }
        $orders->update();

        return redirect()->route('user.dashboard')->with('success', 'Terima kasih orderan sudah dihapus.');
    }
    
    public function jemputBarang($id)
    {
        $orders = Order::find($id);
        $orders->status = '2';
        $orders->update();
        return redirect()->route('user.dashboard')->with('success', 'Barang akan dijemput');
    }
    public function antarBarang($id)
    {
        $orders = Order::find($id);
        $orders->status = '3';
        $orders->update();
        return redirect()->route('user.dashboard')->with('success', 'Barang sedang dalam proses antar');
    }
    public function sampaiBarang($id)
    {
        $orders = Order::find($id);
        $orders->status = '4';
        $orders->update();
        return redirect()->route('user.dashboard')->with('success', 'Barang sedang dalam proses antar');
    }
}
