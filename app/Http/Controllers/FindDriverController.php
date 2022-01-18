<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use App\Models\DriverArmada;
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
        $decJumlah            = $request->input('jumlah', []);
        $armadaArray          = json_encode($request->armada);
        $backup = array();
        $sum    = 0;

        foreach (json_decode($armadaArray) as $key => $armada) {
            $driver    = DriverArmada::select('user_id')
                                    ->where('armada_id', $armada)
                                    ->limit($decJumlah[$key])->get();  
            if ($decJumlah[$key] == count($driver)) {
                foreach($driver as $key => $driv){
                    $data = [
                        'message'      => 'Finded',
                        'driver_id'     =>$driv->user_id,
                        'orders_id'  => $orders->id
                    ];
                    DB::table('checkouts')->insert($data);
                    array_push($backup, $data);
                }
                // return $backup;

            }else {

                // return back()->with('error', 'Jumlah Driver Tidak Mememenui Syarat!');
         
                foreach ($backup as $key => $restore) {
                    // DB::table('checkouts')->where('driver_id', $restore['driver_id'])->delete();
                    echo $restore['message'];
                }
            }

        }

        
        // for ($h = 0; $h < count($armadas); $h++) {

        //     for($i = 0; $i < $decJumlah[$h]; $i++){
        //         $driver    = DriverArmada::select('user_id')->where('armada_id', $armadas)->limit($decJumlah[$h])->get();    
    
    
        //         if(count($driver) == $decJumlah[$i]){
        //             foreach($driver as $driv){
    
        //                 Checkout::insert([
        //                     'message'      => 'Finded',
        //                     'driver_id'     =>$driv->user_id,
        //                     'orders_id'  => $orders->id
                            
        //                 ]);
        //             }
                    
        //         }
        //     }
        // }
    }
    
}
