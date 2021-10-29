<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\Order;
use App\Models\User;
use App\Models\FeedManager;
use App\Models\RoleUser;
use App\Models\Tracking;
use App\Models\TrackingStatus;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DriverController extends Controller
{


    public function dashboardDriver()
    {
        $i = 1;

        $orders = Order::orderBy('id', 'ASC')->simplePaginate(10);
        $checkout = Checkout::orderBy('id', 'ASC')->simplePaginate(10);
        $driver = RoleUser::where('role_id', 2)->orderBy('role_id', 'ASC')->get();
        $user = User::all();
        $trackings = Tracking::all();
        $track_status = TrackingStatus::orderBy('id', 'ASC')->get();
        
        return view("driver.index", compact('i' ,'orders','checkout', 'driver', 'trackings', 'track_status', 'user'));
        
    }

    public function tolak($id)
    {
        $orders = Order::find($id);
        // $orders->status = null;
        $checkout = Checkout::where('orders_id', $orders->id)->get();
        foreach ($checkout as $checkouts) {
            $checkouts->delete();
        }
        $orders->update();

        return redirect()->route('driver.index')->with('success', 'Terima kasih orderan sudah dihapus.');
    }
   
    
    public function terima($id)
    {
        $checkout = Checkout::find($id);
        $orders = $checkout->orders;
        $orders->status = '2';
        $orders->update();
        $checkout->message = 'Verified';
        $checkout->update();


        $tracking = new Tracking();
        $tracking->status = '1';
        $tracking->checkout_id = $checkout->id;
        $tracking->driver_id   = Auth::id();
        $tracking->save();

        $status = new TrackingStatus();
        $status->status = 'Terima';
        $status->track_id = $tracking->id;
        $status->save();

        return redirect()->route('driver.index')->with('success', 'Orderan Diterima');
    }
    public function jemputBarang(Request $request, $id)
    {
        // $tracking = Tracking::find($id);
        // $tracking->status = '0';
        // $tracking->update();
        $tracking = Tracking::find($id);
        $tracking->status = '2';
        $tracking->checkout_id = $request->checkout_id;
        $tracking->driver_id   = Auth::id();
        $tracking->update();

        $status = new TrackingStatus();
        $status->status = 'Jemput';
        $status->track_id = $tracking->id;
        $status->save();
       
        return redirect()->route('driver.index')->with('success', 'Barang akan dijemput');
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
       
        return redirect()->route('driver.index')->with('success', 'Barang sedang dalam proses antar');
    }
   
    public function sampaiBarang($id)
    {

  
        $status = TrackingStatus::find($id);
        $status->status = 'Sampai';
        $status->update();
        // $tracking = Tracking::find($id);
        // $tracking->status = '4';
        // $tracking->checkout_id = $tracking->checkout->id;
        // $tracking->driver_id   = Auth::id();
        // $tracking->update();


        return redirect()->route('driver.index')->with('success', 'Barang sudah sampai');
    }
    
}
