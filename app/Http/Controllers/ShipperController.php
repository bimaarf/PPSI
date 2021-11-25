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
use Illuminate\Support\Facades\Auth;
class ShipperController extends Controller
{
    public function dashboard()
    {
        $permission_user = PermissionUser::all();
        $pesananSaya = DB::table('orders')->count();
        $pesananDiproses = DB::table('orders')->where('status', 'Process')->count();
        $pesananDibatalkan = DB::table('orders')->where('status', 'Canceled')->count();
        $pesananSelesai = DB::table('orders')->where('status', 'Finished')->count();
      
        return view('user.index', compact('permission_user', 'pesananSaya', 'pesananDiproses', 'pesananDibatalkan', 'pesananSelesai'));
    }
    public function pesananDiproses()
    {
        // shipper
        $i = 1;
        $orders = Order::orderBy('id', 'DESC')->simplePaginate(5);
        // driver
        $checkout = Checkout::orderBy('id', 'DESC')->simplePaginate(5);
        // feed manager
        $feed_manager = FeedManager::orderBy('id', 'ASC')->simplePaginate(5);
        
        $pesananSaya = DB::table('orders')->count();
        $pesananDiproses = DB::table('orders')->where('status', 'Process')->count();
        $pesananDibatalkan = DB::table('orders')->where('status', 'Canceled')->count();
        $pesananSelesai = DB::table('orders')->where('status', 'Finished')->count();
        return view("user.pesanan_diproses", compact('i','orders', 'checkout', 'feed_manager', 'pesananSaya', 'pesananDiproses', 'pesananDibatalkan', 'pesananSelesai'));
    }
    public function pesananAnda()
    {
        // shipper
        $i = 1;
        $orders = Order::orderBy('id', 'DESC')->simplePaginate(5);
        // driver
        $checkout = Checkout::orderBy('id', 'DESC')->simplePaginate(5);
        $driver = User::whereRoleIs(['driver'])->inRandomOrder()->get();
        $feed_manager = FeedManager::orderBy('id', 'ASC')->simplePaginate(5);
        $pesananSaya = DB::table('orders')->where('user_id', Auth::id())->count();
        $pesananDiproses = DB::table('orders')->where('status', 'Process')->where('user_id', Auth::id())->count();
        $pesananDibatalkan = DB::table('orders')->where('status', 'Canceled')->where('user_id', Auth::id())->count();
        $pesananSelesai = DB::table('orders')->where('status', 'Finished')->where('user_id', Auth::id())->count();

        return view("user.pesanan_anda", compact('i' ,'driver','orders', 'checkout', 'feed_manager', 'pesananSaya', 'pesananDiproses', 'pesananDibatalkan', 'pesananSelesai'));
    }
    public function pesananDibatalkan()
    {
        // shipper
        $i = 1;
        $orders = Order::orderBy('id', 'DESC')->simplePaginate(10);
        // driver
        $checkout = Checkout::orderBy('id', 'DESC')->simplePaginate(10);
        $driver = User::whereRoleIs(['driver'])->inRandomOrder()->get();
        $feed_manager = FeedManager::orderBy('id', 'DESC')->simplePaginate(10);

        $pesananSaya = DB::table('orders')->count();
        $pesananDiproses = DB::table('orders')->where('status', 'Process')->count();
        $pesananDibatalkan = DB::table('orders')->where('status', 'Canceled')->count();
        $pesananSelesai = DB::table('orders')->where('status', 'Finished')->count();
        return view("user.pesanan_dibatalkan", compact('i' ,'driver','orders', 'checkout', 'feed_manager', 'pesananSaya', 'pesananDiproses', 'pesananDibatalkan', 'pesananSelesai'));
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
