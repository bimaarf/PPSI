<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\FeedManager;
use App\Models\Checkout;
use App\Models\TrackingStatus;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AdminActivity;
use App\Models\PermissionUser;
use App\Models\Tracking;
use Illuminate\Support\Facades\DB;
class ShipperController extends Controller
{
    public function dashboard()
    {
        $permission_user = PermissionUser::all();
        $tAdmin = DB::table('role_user')->where('role_id', 2)->count();
        $tDriver = DB::table('role_user')->where('role_id', 3)->count();
        $tShipper = DB::table('role_user')->where('role_id', 4)->count();
        $activity = AdminActivity::orderBy('id', 'DESC')->get();
      
        return view('user.index', compact('permission_user', 'tAdmin', 'tDriver', 'tShipper', 'activity'));
    }
    public function pesananDiproses()
    {
        // shipper
        $i = 1;
        $orders = Order::orderBy('id', 'ASC')->simplePaginate(10);
        // driver
        $checkout = Checkout::orderBy('id', 'ASC')->simplePaginate(10);
        // feed manager
        $feed_manager = FeedManager::orderBy('id', 'ASC')->simplePaginate(10);

        return view("user.pesanan_diproses", compact('i','orders', 'checkout', 'feed_manager'));
    }
    public function pesananAnda()
    {
        // shipper
        $i = 1;
        $orders = Order::orderBy('id', 'ASC')->simplePaginate(10);
        // driver
        $checkout = Checkout::orderBy('id', 'ASC')->simplePaginate(10);
        $driver = User::whereRoleIs(['driver'])->inRandomOrder()->get();
        $feed_manager = FeedManager::orderBy('id', 'ASC')->simplePaginate(10);

        return view("user.pesanan_anda", compact('i' ,'driver','orders', 'checkout', 'feed_manager'));
    }
    public function pesananDibatalkan()
    {
        // shipper
        $i = 1;
        $orders = Order::orderBy('id', 'ASC')->simplePaginate(10);
        // driver
        $checkout = Checkout::orderBy('id', 'ASC')->simplePaginate(10);
        $driver = User::whereRoleIs(['driver'])->inRandomOrder()->get();
        $feed_manager = FeedManager::orderBy('id', 'ASC')->simplePaginate(10);

        return view("user.pesanan_dibatalkan", compact('i' ,'driver','orders', 'checkout', 'feed_manager'));
    }

    public function konfirmasiBarang($id)
    {
        $status = TrackingStatus::find($id);
        $status->status = 'Konfirmasi';
        $status->update();
        $trackings = Tracking::where('id', $status->track->id)->first();
        $trackings->status = 'Finished';
        $trackings->update();
        $checkouts = Checkout::where('id', $status->track->checkout->id)->first();
        $checkouts->message = 'Finished';
        $checkouts->update();   
        $orders = Order::where('id', $status->track->checkout->orders->id)->first();
        $orders->status = 'Finished';
        $orders->update();
        return back()->with('success', 'Terima kasih, anda sudah mengonfirmasi dan paket sudah anda terima.');

    }
}
