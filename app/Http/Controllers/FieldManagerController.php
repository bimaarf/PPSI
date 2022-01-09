<?php

namespace App\Http\Controllers;

use App\Models\Armada;
use App\Models\Order;
use Illuminate\Http\Request;

class FieldManagerController extends Controller
{
    public function akunSaya()
    {
        return view('checker.akun_saya');
    }

    public function pesanan()
    {
        $armadas = Armada::all();
        $orders = Order::orderBy('id', 'DESC')->get();
        return view('checker.pesanan', compact('orders', 'armadas'));
    }
}
