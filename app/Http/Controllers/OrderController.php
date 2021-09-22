<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Order;
use RajaOngkir;

class OrderController extends Controller
{
    public function index() 
    {
        // $provinsi = RajaOngkir::province()->get();
        // $city = RajaOngkir::city()->get();
        // $city = RajaOngkir::city()->where('province_id', $request->get('id'))
        //     ->pluck('name', 'id');
    
        // return response()->json($cities);
        
        return view("user.index");
    }

    public function tambah(Request $request)
    {
        // $request->validate([
            
            // 'provinsi_a' => 'required',
            // 'kab_kota_a' => 'required',
            // 'telp_a' => 'required',
            // 'alamat_a' => 'required',
            // 'armada' => 'required',
            // 'jadwal' => 'required',
            // 'multi' => 'required',
            // 'jenis_barang' => 'required',
            // 'panjang' => 'required',
            // 'lebar' => 'required',
            // 'tinggi' => 'required',
            // 'provinsi_b' => 'required',
            // 'kab_kota_b' => 'required',
            // 'telp_b' => 'required',
            // 'total' => 'required',
            // 'alamat_b' => 'required',
            // 'user_id' => 'required'.Auth::user()->id,
        //     'alamat_b' => 'required'
        // ]);
     
        // foreach ($request->addMoreInputFields as $key => $value) {
        //     Product::create($value);
        // }
        // foreach ($request->alamat_b as $key => $value) {
        //     Product::create([
        //         'provinsi_a'    => $request->provinsi_a,
        //         'kab_kota_a'    => $request->kab_kota_a,
        //         'telp_a'        => $request->telp_a,
        //         'alamat_a'      => $request->alamat_a,
        //         'armada'        => $request->armada,
        //         'jadwal'        => $request->jadwal,
        //         'multi'         => $request->multi,
        //         'jenis_barang'  => $request->jenis_barang,
        //         'jumlah_barang' => $request->jumlah_barang,
        //         'panjang'       => $request->panjang,
        //         'lebar'         => $request->lebar,
        //         'tinggi'        => $request->tinggi,
        //         'provinsi_b'    => $request->provinsi_b,
        //         'kab_kota_b'    => $request->kab_kota_b,
        //         'telp_b'        => $request->telp_b,
        //         'total'         => $request->total,
        //         'user_id'       => Auth::user()->id
        //     ]);
        // }
      
        // $orders = new Order();
        // $orders->armada              = $request->armada;
        // $orders->jadwal              = $request->jadwal;
        // $orders->jemput              = $request->jemput;
        // $orders->telp_jemput         = $request->telp_jemput;
        // $orders->alamat_jemput       = $request->alamat_jemput;
        // $orders->feed_m              = $request->feed_m;
        // $orders->tujuan              = json_encode($request->tujuan);
        // $orders->telp_tujuan         = json_encode($request->telp_tujuan);
        // $orders->alamat_tujuan       = json_encode($request->alamat_tujuan);
        // $orders->user_id             = Auth::id();
        // $orders->save();
        // return dd();
        // return back()->with('success', 'New subject has been added.');

        $pesan['jemput']              = $request->jemput;
        $pesan['nama_pengirim']       = $request->nama_pengirim;
        $pesan['start_time']          = $request->start_time;
        $pesan['arrival_time']        = $request->arrival_time;
        $pesan['telp_jemput']         = $request->telp_jemput;
        $pesan['alamat_jemput']       = $request->alamat_jemput;
        $pesan['armada']              = $request->armada;
        $pesan['jadwal']              = $request->jadwal;
        $pesan['feed_m']              = $request->feed_m;
        $pesan['tujuan']              = json_encode($request->tujuan);
        $pesan['nama_penerima']       = json_encode($request->nama_penerima);
        $pesan['alamat_tujuan']       = json_encode($request->alamat_tujuan);
        $pesan['telp_tujuan']         = json_encode($request->telp_tujuan);
        // return dd($pesan);
        if (Auth::check()) {
            $orders = new Order();
            $orders->jemput              = $pesan['jemput'];
            $orders->nama_pengirim       = $pesan['nama_pengirim'];
            $orders->start_time          = $pesan['start_time'];
            $orders->arrival_time        = $pesan['arrival_time'];
            $orders->telp_jemput         = $pesan['telp_jemput'];
            $orders->alamat_jemput       = $pesan['alamat_jemput'];
            $orders->armada              = $pesan['armada'];
            $orders->jadwal              = $pesan['jadwal'];
            $orders->feed_m              = $pesan['feed_m'];
            $orders->tujuan              = $pesan['tujuan'];
            $orders->nama_penerima       = $pesan['nama_penerima'];
            $orders->alamat_tujuan       = $pesan['alamat_tujuan'];
            $orders->telp_tujuan         = $pesan['telp_tujuan'];
            $orders->user_id = Auth::id();
            $orders->save();
            return back()->with('success', 'Terima kasih orderan anda sedang diproses.');
        } else {
            $request->session()->put('pesan', $pesan);
            return redirect()->route('login');
        }
    }
}
