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
    public function akunSaya()
    {
        $permission_user = PermissionUser::all();
        $pesananSaya = DB::table('orders')->where('status', null)->where('deleted_at', null)->count();
        $pesananDiproses = DB::table('orders')->where('status', 'Process')->count();
        $pesananDibatalkan = DB::table('orders')->where('status', 'Canceled')->count();
        $pesananSelesai = DB::table('orders')->where('status', 'Finished')->count();
      
        return view('user.index', compact('permission_user', 'pesananSaya', 'pesananDiproses', 'pesananDibatalkan', 'pesananSelesai'));
    }
    public function pesanan()
    {
        $pesananSaya = DB::table('orders')->where('status', null)->where('deleted_at', null)->count();
        $pesananDiproses = DB::table('orders')->where('status', 'Process')->count();
        $pesananDibatalkan = DB::table('orders')->where('deleted_at', '!=', null)->count();
        $pesananSelesai = DB::table('orders')->where('status', 'Finished')->count();
        // pesanan masuk
        $i = 1;
        $orders = Order::orderBy('id', 'DESC')->simplePaginate(5);
        // driver
        $checkouts = Checkout::orderBy('id', 'DESC')->get();
        $checkout = Checkout::orderBy('id', 'DESC')->simplePaginate(5);
        $tracking   = Tracking::orderBy('id', 'ASC')->get();
        $users  = User::all();
        $driver = User::whereRoleIs(['driver'])->inRandomOrder()->get();
        return view('user.pesanan', compact(
            'pesananSaya',
            'pesananDiproses',
            'pesananDibatalkan',
            'pesananSelesai',
            'i',
            'orders',
            'checkout',
            'checkouts',
            'tracking',
            'users',
            'driver'
        ));
    }
    public function tableProses()
    {
        $i = 1;
        $orders = Order::orderBy('id', 'DESC')->simplePaginate(5);
        $checkouts = Checkout::orderBy('id', 'DESC')->get();
        $track_status = TrackingStatus::all();
        $users  = User::all();
        $tracking   = Tracking::orderBy('id', 'ASC')->get();
        return view('user.partial.table_proses', compact(
            'i',
            'orders',
            'checkouts',
            'track_status',
            'users',
            'tracking'
        ));
    }
    
    public function tableSelesai()
    {
        $i = 1;
        $orders = Order::orderBy('id', 'DESC')->simplePaginate(5);
        // driver
        $checkout = Checkout::orderBy('id', 'DESC')->simplePaginate(5);
        $driver = User::whereRoleIs(['driver'])->inRandomOrder()->get();
        return view('user.partial.table_selesai', compact(
            'i',
            'orders',
            'checkout',
            'driver'
        ));
    }
    public function tableBatal()
    {
        $i = 1;
        $orders = Order::orderBy('id', 'DESC')->onlyTrashed()->simplePaginate(5);
        // driver
        $checkout = Checkout::orderBy('id', 'DESC')->simplePaginate(5);
        $driver = User::whereRoleIs(['driver'])->inRandomOrder()->get();
        return view('user.partial.table_batal', compact(
            'i',
            'orders',
            'checkout',
            'driver'
        ));
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
     public function hapusPesanan($id)
     {
         $orders = Order::find($id);
         $orders->delete();
         return back()->with('success', 'Pesanan sudah dibatalkan');
     }
}
