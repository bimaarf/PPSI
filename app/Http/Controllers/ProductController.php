<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use RajaOngkir;

class ProductController extends Controller
{
    public function index() 
    {
        $provinsi = RajaOngkir::province()->get();
        $city = RajaOngkir::city()->get();
        // $city = RajaOngkir::city()->where('province_id', $request->get('id'))
        //     ->pluck('name', 'id');
    
        // return response()->json($cities);
        
        return view("user.dashboard", compact('provinsi', 'city'));
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
      
        $product = new Product();
        $product->provinsi_a    = $request->provinsi_a;
        $product->kab_kota_a    = $request->kab_kota_a;
        $product->telp_a        = $request->telp_a;
        $product->alamat_a      = $request->alamat_a;
        $product->armada        = $request->armada;
        $product->jadwal        = $request->jadwal;
        $product->multi         = $request->multi;
        $product->jenis_barang  = $request->jenis_barang;
        $product->jumlah_barang = $request->jumlah_barang;
        $product->panjang       = $request->panjang;
        $product->lebar         = $request->lebar;
        $product->tinggi        = $request->tinggi;
        $product->provinsi_b    = $request->provinsi_b;
        $product->kab_kota_b    = $request->kab_kota_b;
        $product->telp_b        = $request->telp_b;
        $product->total         = $request->total;
        $product->alamat_b      = $request->alamat_b;
        $product->user_id       = Auth::id();
            
        $product->save();
        // return dd();
        return back()->with('success', 'New subject has been added.');
    }
}
