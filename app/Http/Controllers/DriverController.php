<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\Order;
use App\Models\User;
use App\Models\FeedManager;
use App\Models\RoleUser;
use Illuminate\Support\Facades\DB;

class DriverController extends Controller
{
    public function dashboardDriver()
    {
        $orders = Order::orderBy('id', 'ASC')->simplePaginate(10);
        $checkout = Checkout::orderBy('id', 'ASC')->simplePaginate(10);
        $driver = RoleUser::where('role_id', 2)->get();
        return view("driver.index", compact('orders','checkout', 'driver'));
        
    }

    public function deleteCheckout($id)
    {
        $orders = Order::find($id);
        $orders->status = null;
        $checkout = Checkout::where('orders_id', $orders->id)->get();
        foreach ($checkout as $checkouts) {
            $checkouts->delete();
        }
        $orders->update();

        return redirect()->route('driver.index')->with('success', 'Terima kasih orderan sudah dihapus.');
    }
    
    public function terima($id)
    {
        $orders = Order::find($id);
        $orders->status = '2';
        $orders->update();
        return redirect()->route('driver.index')->with('success', 'Orderan Diterima');
    }
    public function jemputBarang($id)
    {
        $orders = Order::find($id);
        $orders->status = '3';
        $orders->update();
        return redirect()->route('driver.index')->with('success', 'Barang akan dijemput');
    }
    public function antarBarang($id)
    {
        $orders = Order::find($id);
        $orders->status = '4';
        $orders->update();
        return redirect()->route('driver.index')->with('success', 'Barang sedang dalam proses antar');
    }
    public function sampaiBarang($id)
    {
        $orders = Order::find($id);
        $orders->status = '5';
        $orders->update();
        return redirect()->route('driver.index')->with('success', 'Barang sudah sampai');
    }
    
}
