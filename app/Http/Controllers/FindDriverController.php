<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\DriverArmada;
use App\Models\DriverJalur;
use App\Models\Order;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class FindDriverController extends Controller
{
    public function find(Request $request, $id)
    {
        $orders = Order::find($id);
        $orders->status = 'Process';
        $orders->update();
        $checkout = new Checkout();
        $checkout->message   = 'Finded';
        $checkout->orders_id = $orders->id;
        $checkout->driver_id = json_encode($request->driver_id);

        foreach(json_decode($checkout->driver_id) as $drvDecode)
        {
            $checkouts = new Checkout();
            $checkouts->message   = 'Finded';
            $checkouts->orders_id = $orders->id;
            $checkouts->driver_id = $drvDecode;
            $checkouts->save();
        }

        return back()->with('success', 'Terima kasih, kami akan carikan anda driver.');
    }


    public function findByField(Request $request, $id)
    {
        $orders     = Order::find($id);
        $jemput = $orders->jemput;
        $tujuan = $orders->tujuan;
        $decJumlah            = $request->input('jumlah', []);
        $armadaArray          = json_encode($request->armada);
        $backupArmada = array();
        $backupJalur = array();
        $sum    = 0;

        $driverJalur = DriverJalur::where('rute', '!=', null)->get();


        foreach ($driverJalur as $driver) {
            $x=0;
            foreach (json_decode($driver->rute) as $rute) {
                if ($rute == $jemput) {
                    $x++;
                }

                foreach (json_decode($tujuan) as $tuju) {
                    if ($rute == $tuju) {
                        $x++;
                    }
                }
            }
                if ($x==count(json_decode($tujuan))+1) {
                    $data = $driver->user_id;
                    array_push($backupJalur, $data);
                }
        }

        foreach (json_decode($armadaArray) as $key => $armada) {
            $driver    = DriverArmada::select('user_id')
                                    ->where('armada_id', $armada)
                                    ->get();
                foreach($driver as $key => $driv){
                    $data = $driv->user_id;
                    array_push($backupArmada, $data);
                }
                // return $backup;
        }

        $result= array_intersect($backupArmada,$backupJalur);
        for ($i=0; $i < $decJumlah[0]; $i++) {
            $checkout = new Checkout();
            $checkout->message = 'Finded';
            $checkout->driver_id = $result[$i];
            $checkout->orders_id = $orders->id;
            $checkout->save();
        }

    }

}
