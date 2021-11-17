<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\Order;
use App\Models\User;
use App\Models\RoleUser;
use App\Models\Tracking;
use App\Models\TrackingStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\AdminActivity;
use App\Models\PermissionUser;

class DriverController extends Controller
{

    public function akunSaya()
    {
        return view('driver.index');
    }
    public function pesananMasuk()
    {
        $i = 1;

        $orders = Order::orderBy('id', 'ASC')->simplePaginate(10);
        $checkout = Checkout::orderBy('id', 'ASC')->simplePaginate(10);
        $driver = RoleUser::where('role_id', 2)->orderBy('role_id', 'ASC')->get();
        $user = User::whereRoleIs(['driver'])->inRandomOrder()->get();
        $trackings = Tracking::all();
        $track_status = TrackingStatus::orderBy('id', 'ASC')->get();
        
        return view('driver.pesanan_masuk', compact('i' ,'orders','checkout', 'driver', 'trackings', 'track_status', 'user'));
        
    }
    public function pesananDiproses()
    {
        $i = 1;

        $orders = Order::orderBy('id', 'ASC')->simplePaginate(10);
        $checkout = Checkout::orderBy('id', 'ASC')->simplePaginate(10);
        $driver = RoleUser::where('role_id', 2)->orderBy('role_id', 'ASC')->get();
        $user = User::whereRoleIs(['driver'])->inRandomOrder()->get();
        $trackings = Tracking::all();
        $track_status = TrackingStatus::orderBy('id', 'ASC')->get();
        
        return view('driver.pesanan_diproses', compact('i' ,'orders','checkout', 'driver', 'trackings', 'track_status', 'user'));
        
    }
    public function pesananDibatalkan()
    {
        $i = 1;

        $orders = Order::orderBy('id', 'ASC')->simplePaginate(10);
        $checkout = Checkout::orderBy('id', 'ASC')->simplePaginate(10);
        $driver = RoleUser::where('role_id', 2)->orderBy('role_id', 'ASC')->get();
        $user = User::whereRoleIs(['driver'])->inRandomOrder()->get();
        $trackings = Tracking::all();
        $track_status = TrackingStatus::orderBy('id', 'ASC')->get();
        
        return view('driver.pesanan_dibatalkan', compact('i' ,'orders','checkout', 'driver', 'trackings', 'track_status', 'user'));
        
    }

    public function tolak(Request $request, $id)
    {
        $checkout = Checkout::find($id);
        $checkout->message = 'Canceled';
        if($checkout->update())
        {
            $checkouts = new Checkout();
            $checkouts->message = 'Finded';
            $checkouts->orders_id = $checkout->orders_id;
            $checkouts->driver_id = $request->driver_id;
            $checkouts->save();
            return redirect()->route('driver.pesanan_dibatalkan')->with('success', 'Anda menolak pesanan!');
        }
       
    }
   
    
    public function terima($id)
    {
        $checkout = Checkout::find($id);
        
        $checkout->message = 'Verified';
        $checkout->update();

        $orders = $checkout->orders;
        $orders->status = 'Process';
        $orders->update();
        
        $users = Auth::user();
        $users->status_id = 3;
        $users->update();

        $tracking = new Tracking();
        $tracking->status = '1';
        $tracking->checkout_id = $checkout->id;
        $tracking->driver_id   = Auth::id();
        $tracking->save();

        $status = new TrackingStatus();
        $status->status = 'Terima';
        $status->track_id = $tracking->id;
        $status->save();
        
        return redirect()->route('driver.pesanan_diproses')->with('success', 'Terima kasih, anda sudah menerima pesanan.');
    }
    public function jemputBarang(Request $request, $id)
    {
        $tracking = Tracking::find($id);
        $tracking->status = '2';
        $tracking->checkout_id = $request->checkout_id;
        $tracking->driver_id   = Auth::id();
        $tracking->update();

        $status = new TrackingStatus();
        $status->status = 'Jemput';
        $status->track_id = $tracking->id;
        $status->save();
       
        return redirect()->route('driver.pesanan_diproses')->with('success', 'Kami akan memberi tahu shipper bahwa anda akan segera menjemput pesanan.');
    }

    public function antarBarang(Request $request, $id)
    {
        $tracking = Tracking::find($id);
        $tracking->status = '3';
        $tracking->checkout_id = $request->checkout_id;
        $tracking->driver_id   = Auth::id();
        $tracking->update();
        $status = new TrackingStatus();
            $status->status = 'Proses antar';
            $status->track_id = $tracking->id;
            $status->alamat      = null;
            $status->save();

        foreach(json_decode($tracking->checkout->orders->alamat_tujuan) as $almt)
        {
            $status = new TrackingStatus();
            $status->status = 'Belum sampai';
            $status->track_id = $tracking->id;
            $status->alamat      = $almt;
            $status->save();
        }
       
        return redirect()->route('driver.pesanan_diproses')->with('success', 'Kami akan memberi tahu shipper bahwa anda akan segera mengantar pesanan.');
    }
   
    public function sampaiBarang($id)
    {
        $status = TrackingStatus::find($id);
        $status->status = 'Sampai';
        $status->update();
        $users = Auth::user();
        $users->status_id = 1;
        $users->update();
        
        return redirect()->route('driver.pesanan_diproses')->with('success', 'Kami akan memberi tahu shipper bahwa anda pesanan sudah sampai.');
    }
    
}
