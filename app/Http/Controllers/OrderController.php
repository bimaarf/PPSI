<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Order;
use App\Models\Zone;
use App\Models\User;
use App\Models\RoleUser;
use App\Models\Checkout;
use Illuminate\Support\Facades\DB;
use RajaOngkir;

class OrderController extends Controller
{
    public function index(Request $request) 
    {
        $zone = Zone::get();
        $orders = $request->session()->get('orders');
        return view("user.index", compact('zone', 'orders'));
    }
    public function index2(Request $request) 
    {
        $zone = Zone::get();
        $orders = $request->session()->get('orders');
        return view("user.index2", compact('zone', 'orders'));
    }
    public function tambah(Request $request)
    {
        $pesan['key']                 = Str::random(30);
        $pesan['jemput']              = $request->jemput;
        $pesan['nama_pengirim']       = $request->nama_pengirim;
        $pesan['start_time']          = $request->start_time;
        $pesan['arrival_time']        = $request->arrival_time;
        $pesan['telp_jemput']         = $request->telp_jemput;
        $pesan['alamat_jemput']       = $request->alamat_jemput;
        $pesan['armada']              = $request->armada;
        $pesan['jadwal']              = $request->jadwal;
        $pesan['feed_m']              = $request->feed_m;

        $request->session()->put('pesan', $pesan);
            return redirect()->route('user.index2');
           
    }
    public function tambah2(Request $request)
    {
        $pesan = $request->session()->get('pesan');
        $pesan['tujuan']              = json_encode($request->tujuan);
        $pesan['nama_penerima']       = json_encode($request->nama_penerima);
        $pesan['alamat_tujuan']       = json_encode($request->alamat_tujuan);
        $pesan['telp_tujuan']         = json_encode($request->telp_tujuan);
        $request->session()->put('pesan', $pesan);
        // return dd($pesan);
        if (Auth::check()) {
            $pesan = $request->session()->get('pesan');
                $orders = new Order();
                $orders->key                 = $pesan['key'];
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
                $request->session()->forget('pesan');
            // return back()->with('success', 'Terima kasih orderan anda sedang diproses.');
            // return redirect()->route('user.order');
            return redirect()->route('user.detail', ['key'=>$orders->key, 'id'=>$orders->id ])->with('success', 'Terima kasih orderan anda sedang diproses.');

        } else {
            // return dd($pesan);
            return redirect()->route('login');
        }
    }
    public function dashboard()
    {
        // shipper
        $orders = Order::orderBy('id', 'ASC')->simplePaginate(10);
        // driver
        $checkout = Checkout::orderBy('id', 'ASC')->simplePaginate(10);
        return view("user.dashboard", compact('orders', 'checkout'));
    }

    public function detail($id) 
    {
        $orders = Order::find($id);
        $tujuan = explode(",", str_replace(array('[', '"', ']'), ' ', $orders->tujuan));
        $nama_penerima = explode(",", str_replace(array('[', '"', ']'), ' ', $orders->nama_penerima));
        $alamat_tujuan = explode(",", str_replace(array('[', '"', ']'), ' ', $orders->alamat_tujuan));
        $telp_tujuan = explode(",", str_replace(array('[', '"', ']'), ' ', $orders->telp_tujuan));
        $driver = RoleUser::where('role_id', 2)->inRandomOrder()->limit(1)->get();
        $user   = User::all();

        return view("user.detail", compact('orders', 'tujuan', 'nama_penerima', 'alamat_tujuan', 'telp_tujuan', 'driver', 'user' ));
    }
    public function hapus($id)
    {
        $orders = Order::find($id);
        $checkout = Checkout::where('orders_id', $orders->id)->get();
            DB::table('checkout')->delete();

        $orders->delete();

        return redirect()->route('user.dashboard')->with('success', 'Terima kasih orderan sudah dihapus.');
    }

    
}
