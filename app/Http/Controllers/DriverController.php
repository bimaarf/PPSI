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
use App\Models\Armada;
use App\Models\DriverArmada;
use App\Models\DriverJalur;
use App\Models\PermissionUser;
use App\Models\Zone;
class DriverController extends Controller
{

    public function akunSaya()
    {
        
        $users     = User::all();
        $pesananSaya = DB::table('checkouts')
                            ->where('driver_id', Auth::id())
                            ->count();
        $pesananDiproses = DB::table('checkouts')
                                ->where('Message', 'Verified')
                                ->where('driver_id', Auth::id())
                                ->count();
        $pesananDibatalkan = DB::table('checkouts')
                                ->where('Message', 'Canceled')
                                ->where('driver_id', Auth::id())
                                ->count();
        $pesananSelesai = DB::table('checkouts')
                                ->where('Message', 'Finished')
                                ->where('driver_id', Auth::id())
                                ->count();
        $zones = Zone::all();
        $driverJalurs  = DriverJalur::where('user_id', Auth::id())
                                // ->where('rute', '!=', null)
                                ->get();
        $jalursCount    = count($driverJalurs);

        foreach($driverJalurs as $driverJalur)
        {
            if($driverJalur->rute !== null)
            {
                $rutes   = json_decode($driverJalur->rute);
                foreach($rutes as $rute)
                {
                    $ruteCount   = count($rutes);
                }
            }else
            {
                $driverJalur        = [
                    ['rute'  =>  'Pontianak'],
                ];
                $rutes = $driverJalur;
                $ruteCount  =   0;

            }
            
        }
       

        $armadas         = Armada::all();
        $driverArmada   =   DriverArmada::all();
                        
        return view('driver.index', 
            compact('driverJalurs','driverJalur','rutes',
                    'jalursCount',
                        'ruteCount',
                        'driverJalur',
                        'users', 
                        'armadas',
                        'driverArmada',
                        'pesananSaya', 
                        'pesananDiproses', 
                        'pesananDibatalkan', 
                        'pesananSelesai', 
                        'zones'
        
        ));
    }
    public function armada(Request $request)
    {
        $armadaRequest     = DriverArmada::where('user_id', Auth::id())->get();
        foreach($armadaRequest as $armada)
        {
            $armada->delete();
        }
        
        $armadas    = json_encode($request->armada_id);
        if($request->has(['armada_id']))
        {
            foreach(json_decode($armadas) as $armada)
            {
                DB::table('d_armada')
                ->where('user_id', Auth::id())
                ->insert([
                    'armada_id'    =>  $armada,
                    'user_id' =>  Auth::id(),
                ]);
            }
            
          
        }else{
            
            DB::table('d_armada')
            ->where('user_id', Auth::id())
            ->insert([
                'armada_id'    =>  null,
                'user_id' =>  Auth::id(),
            ]);
        }
        // Jalur
        $jalurRequest      = DriverJalur::where('user_id', Auth::id())->get();

        foreach($jalurRequest as $jalur)
        {
            $jalur->delete();
        }
        if($request->has(['rute']))
        {
            DriverJalur::insert([
                'rute' =>  json_encode($request->rute),
                'user_id' =>  Auth::id(),
            ]);
          
        }else{
            DriverJalur::insert([
                'user_id' =>  Auth::id(),
            ]);
        }
        return back();
    }
   
    public function pesananMasuk()
    {
        $i = 1;

        $orders = Order::orderBy('id', 'DESC')->simplePaginate(10);
        $checkout = Checkout::orderBy('id', 'DESC')->simplePaginate(10);
        $driver = RoleUser::where('role_id', 2)->orderBy('role_id', 'ASC')->get();
        $user = User::whereRoleIs(['driver'])->inRandomOrder()->get();
        $trackings = Tracking::all();
        $track_status = TrackingStatus::orderBy('id', 'ASC')->get();

        $pesananSaya = DB::table('checkouts')
                        ->where('driver_id', Auth::user()->id)
                        ->count();
        $pesananDiproses = DB::table('checkouts')
                        ->where('message', 'Verified')
                        ->where('driver_id', Auth::user()->id)
                        ->count();
        $pesananDibatalkan = DB::table('checkouts')
                        ->where('message', 'Canceled')
                        ->where('driver_id', Auth::user()->id)
                        ->count();
        $pesananSelesai = DB::table('checkouts')
                        ->where('message', 'Finished')
                        ->where('driver_id', Auth::user()->id)
                        ->count();
        
        return view('driver.pesanan_masuk', compact('i' ,'orders','checkout', 'driver', 'trackings', 'track_status', 'user', 'pesananSaya', 'pesananDiproses', 'pesananDibatalkan', 'pesananSelesai'));
        
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
        
        $pesananSaya = DB::table('checkouts')
                        ->where('driver_id', Auth::user()->id)
                        ->count();
        $pesananDiproses = DB::table('checkouts')
                        ->where('message', 'Verified')
                        ->where('driver_id', Auth::user()->id)
                        ->count();
        $pesananDibatalkan = DB::table('checkouts')
                        ->where('message', 'Canceled')
                        ->where('driver_id', Auth::user()->id)
                        ->count();
        $pesananSelesai = DB::table('checkouts')
                        ->where('message', 'Finished')
                        ->where('driver_id', Auth::user()->id)
                        ->count();

        return view('driver.pesanan_diproses', compact('i' ,'orders','checkout', 'driver', 'trackings', 'track_status', 'user', 'pesananSaya', 'pesananDiproses', 'pesananDibatalkan', 'pesananSelesai'));
        
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
        
        $pesananSaya = DB::table('checkouts')
                        ->where('driver_id', Auth::user()->id)
                        ->count();
        $pesananDiproses = DB::table('checkouts')
                        ->where('message', 'Verified')
                        ->where('driver_id', Auth::user()->id)
                        ->count();
        $pesananDibatalkan = DB::table('checkouts')
                        ->where('message', 'Canceled')
                        ->where('driver_id', Auth::user()->id)
                        ->count();
        $pesananSelesai = DB::table('checkouts')
                        ->where('message', 'Finished')
                        ->where('driver_id', Auth::user()->id)
                        ->count();
        return view('driver.pesanan_dibatalkan', 
        compact('i' ,'orders','checkout', 'driver', 'trackings', 'track_status', 'user', 'pesananSaya', 'pesananDiproses', 'pesananDibatalkan', 'pesananSelesai'));
        
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
            return redirect()->route('driver.pesanan_dibatalkan')
                        ->with('success', 'Anda menolak pesanan!');
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
        
        return redirect()->route('driver.pesanan_diproses')
                    ->with('success', 'Terima kasih, anda sudah menerima pesanan.');
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
       
        return redirect()->route('driver.pesanan_diproses')
                    ->with('success', 'Kami akan memberi tahu shipper bahwa anda akan segera menjemput pesanan.');
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
       
        return redirect()->route('driver.pesanan_diproses')
                    ->with('success', 'Kami akan memberi tahu shipper bahwa anda akan segera mengantar pesanan.');
    }
   
    public function sampaiBarang($id)
    {
        $status = TrackingStatus::find($id);
        $status->status = 'Sampai';
        $status->update();
        $users = Auth::user();
        $users->status_id = 1;
        $users->update();
        
        return redirect()->route('driver.pesanan_diproses')
                    ->with('success', 'Kami akan memberi tahu shipper bahwa anda pesanan sudah sampai.');
    }
    
}
