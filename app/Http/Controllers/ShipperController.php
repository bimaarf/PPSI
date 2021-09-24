<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
class ShipperController extends Controller
{
    public function konfirmasiBarang($id)
    {
        $orders = Order::find($id);
        $orders->status = '5';
        $orders->update();
        return redirect()->route('user.dashboard')->with('success', 'Barang diterima');
    }
}
