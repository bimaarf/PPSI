<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Order;
use App\Models\Zone;
use App\Models\User;
use App\Models\RoleUser;
use App\Models\Checkout;
use App\Models\FeedManager;
use Illuminate\Support\Facades\DB;
use Session;
class OrderController extends Controller
{

    public function form1(Request $request)
    {
        $zone = Zone::get();
        $orders = $request->session()->get('orders');
        return view("orders.form_1", compact('zone', 'orders'));
    }
    public function form2(Request $request)
    {
        if ($request->session()->get('pesan')) {
            $zone = Zone::get();
            $orders = Order::all();
            $pesan = $request->session()->get('pesan');
            $address = session()->get('pesan')['jemput'];
            $field = session()->get('pesan')['feed_m'];
            $orders->feed_m              = $pesan['feed_m'];
            return view("orders.form_2", compact('zone', 'orders', 'address', 'field'));
        }else {
            return redirect()->route("orders.form_1");
        }
    }
    public function tambah(Request $request)
    {
        $pesan['key']                 = Str::random(30);
        $pesan['jemput']              = $request->jemput;
        $pesan['nama_pengirim']       = $request->nama_pengirim;
        $pesan['start_time']          = $request->start_time;
        $pesan['arrival_time']        = $request->arrival_time;
        $pesan['telp_jemput']         = 62 . $request->telp_jemput;
        $pesan['alamat_jemput']       = $request->alamat_jemput;
        $pesan['armada']              = $request->armada;
        $pesan['jadwal']              = $request->jadwal;
        $pesan['feed_m']              = $request->feed_m;

        $request->session()->put('pesan', $pesan);
            return redirect()->route('orders.form_2');

    }
    public function tambah2(Request $request)
    {
        $pesan = $request->session()->get('pesan');
        $pesan['nama_barang']         = $request->nama_barang;
        $pesan['jenis_barang']        = $request->jenis_barang;
        $pesan['tujuan']              = json_encode($request->tujuan);
        $pesan['nama_penerima']       = json_encode($request->nama_penerima);
        $pesan['alamat_tujuan']       = json_encode($request->alamat_tujuan);
        $pesan['telp_tujuan']         = json_encode($request->telp_tujuan);
        $request->session()->put('pesan', $pesan);
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
                $orders->nama_barang         = $pesan['nama_barang'];
                $orders->jenis_barang        = $pesan['jenis_barang'];
                $orders->tujuan              = $pesan['tujuan'];
                $orders->nama_penerima       = $pesan['nama_penerima'];
                $orders->alamat_tujuan       = $pesan['alamat_tujuan'];
                $orders->telp_tujuan         = $pesan['telp_tujuan'];
                $orders->user_id = Auth::id();
                $request->session()->forget('pesan');
                if($orders->feed_m == 0){
                    $orders->status = 'Find Checker';
                    $orders->save();

                }else{
                    $orders->save();
                }
            $request->session()->forget('pesan');
            return redirect()->route('user.pesanan')->with('success', 'Terima kasih, silahkan cek kembali pesanan anda.');

        } else {
            return redirect()->route('login');
        }


    }

    public function detail($id)
    {
        $orders = Order::find($id);
        $tujuan        = explode(",", str_replace(array('[', '"', ']'), ' ', $orders->tujuan));
        $nama_penerima = explode(",", str_replace(array('[', '"', ']'), ' ', $orders->nama_penerima));
        $alamat_tujuan = explode(",", str_replace(array('[', '"', ']'), ' ', $orders->alamat_tujuan));
        $telp_tujuan   = explode(",", str_replace(array('[', '"', ']'), ' ', $orders->telp_tujuan));
        $driver = User::whereRoleIs(['driver'])->inRandomOrder()->get();
        $feed_manager = RoleUser::where('role_id', 4)->inRandomOrder()->limit(1)->get();
        $user   = User::all();

        return view("orders.detail", compact('orders', 'tujuan', 'nama_penerima', 'alamat_tujuan', 'telp_tujuan', 'driver', 'feed_manager', 'user' ));
    }

}
