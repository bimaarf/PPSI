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

    public function dashboard()
    {
        $permission_user = PermissionUser::all();
        $tAdmin = DB::table('role_user')->where('role_id', 2)->count();
        $tDriver = DB::table('role_user')->where('role_id', 3)->count();
        $tShipper = DB::table('role_user')->where('role_id', 4)->count();
        $activity = AdminActivity::orderBy('id', 'DESC')->get();
      
        return view('driver.index', compact('permission_user', 'tAdmin', 'tDriver', 'tShipper', 'activity'));
    }
    public function pesananMasuk()
    {
        $i = 1;

        $orders = Order::orderBy('id', 'ASC')->simplePaginate(10);
        $checkout = Checkout::orderBy('id', 'ASC')->simplePaginate(10);
        $driver = RoleUser::where('role_id', 2)->orderBy('role_id', 'ASC')->get();
        $user = User::get();
        $trackings = Tracking::all();
        $track_status = TrackingStatus::orderBy('id', 'ASC')->get();
        
        return view('driver.pesanan_masuk', compact('i' ,'orders','checkout', 'driver', 'trackings', 'track_status', 'user'));
        
    }

    public function tolak($id)
    {
        $checkout = Checkout::find($id);
        $checkout->message = 'Canceled';
        // $checkout->driver_id = json_encode($request->driver_id);
        $checkout->update();
        return redirect()->route('driver.pesanan_masuk')->with('success', 'Sedang mencari driver');
    }
   
    
    public function terima($id)
    {
        $checkout = Checkout::find($id);
        
        $checkout->message = 'Verified';
        $checkout->update();

        $orders = $checkout->orders;
        $orders->status = '2';
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
        
        return redirect()->route('driver.pesanan_masuk')->with('success', 'Orderan Diterima');
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
       
        return redirect()->route('driver.pesanan_masuk')->with('success', 'Barang akan dijemput');
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
       
        return redirect()->route('driver.pesanan_masuk')->with('success', 'Barang sedang dalam proses antar');
    }
   
    public function sampaiBarang($id)
    {
        $status = TrackingStatus::find($id);
        $status->status = 'Sampai';
        $status->update();
        $users = Auth::user();
        $users->status_id = 1;
        $users->update();
        
        return redirect()->route('driver.pesanan_masuk')->with('success', 'Barang sudah sampai');
    }
    
}
