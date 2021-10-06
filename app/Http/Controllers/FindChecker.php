<?php

namespace App\Http\Controllers;

use App\Models\FeedManager;
use App\Models\Order;
use Illuminate\Http\Request;

class FindChecker extends Controller
{
    public function find(Request $request, $id)
    {
        $feed_manager = new FeedManager();
        $feed_manager->message = 'Occupied';
        $feed_manager->orders_id = $request->orders_id;
        $feed_manager->feed_id = $request->feed_id;
        $feed_manager->save();
        
        $orders = Order::find($id);
        $orders->status = '7';
        $orders->update();
        return redirect()->route('user.dashboard')->with('success', 'Sedang mencari checker');
    }
}
