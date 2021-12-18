<?php

namespace App\Http\Controllers;

use App\Models\Chatting;
use App\Models\Order;
use App\Models\RoleUser;
use App\Models\Tracking;
use App\Models\Checkout;
use App\Models\TrackingStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChattingController extends Controller
{
    
    public function read(Request $request, $id)
    {
        $checkout = Checkout::orderBy('id', 'ASC')->get();
        $tracking = Tracking::find($id);
        $track_status = TrackingStatus::orderBy('id', 'ASC')->get();
        $users   = User::all();
        // chatting
        $chatting = Chatting::where('track_id', $tracking->id)->get();

        $driver   = Auth::user();
        $role_driver = RoleUser::where('role_id', '2')->get();

        return view('orders.modal.elements.read', compact('checkout','tracking', 'users', 'track_status', 'chatting', 'driver', 'role_driver'));
    }
    public function tambah(Request $request, $id)
    {
        $tracking            = Tracking::find($id);
        $cmt                 = new Chatting();
        $cmt->chat           = $request->chat;
        $cmt->user_id        = Auth::id();
        $cmt->track_id       = $tracking->id;
        $cmt->save();
        return back();

    }
    public function store(Request $request, $id)
    {
        $chat               = new Chatting();
        $chat->chat         = $request->chat;
        $chat->user_id      = Auth::id();
        $chat->track_id     = $id;
        $chat->save();
    }

    public function inbox()
    {
        $id = Auth::id();
        $orders = Order::select('id')->where('user_id', $id)->get();
        $checkouts = array();
        $trackings = array();
        $drivers_name = array();
        $drivers_avatar = array();
        $chattings = array();
        $times = array();

        $chats = array();
        
        
        foreach ($orders as $order) {
            $checkout = Checkout::select('id')
                            ->where('orders_id', $order->id)
                            ->where('message', 'Verified')
                            ->get();
            
            if (count($checkout) != 0) {
                if (count($checkout) > 1) {
                    foreach ($checkout as $check) {
                        array_push($checkouts, $check->id);
                    }
                } else {
                    array_push($checkouts, $checkout[0]->id);
                }
            }
        }


        
        foreach ($checkouts as $checkout) {
            $tracking = Tracking::select('id')->where('checkout_id', $checkout)->get();
            $driver_id = Tracking::select('driver_id')->where('checkout_id', $checkout)->get();
            $driver = User::find($driver_id);
            
            array_push($trackings, $tracking[0]->id);
            array_push($drivers_name, $driver[0]->name);
            array_push($drivers_avatar, $driver[0]->avatar);
        }

        
        foreach ($trackings as $tracking ) {
            $chatting = Chatting::where('track_id', $tracking)->get();
            $last_chat = count($chatting) - 1;
            
            array_push($chattings, $chatting[$last_chat]->chat);
            array_push($times, $chatting[$last_chat]->created_at);
            
        }
        
        for ($i=0; $i < count($trackings); $i++) { 
            $isi = array(
                "track_id" => $trackings[$i],
                "nama_driver" => $drivers_name[$i],
                "avatar_driver" => $drivers_avatar[$i],
                "chat" => $chattings[$i],
                "waktu" => $times[$i],
            );
            
            array_push($chats, $isi);
        }

        $ord = array();
        foreach ($chats as $value) {
            $ord[] = strtotime($value['waktu']);
        }
        array_multisort($ord, SORT_DESC, $chats);
        return view('test.pesan_masuk', compact('chats'));
        
    }

    public function buka($id, $nama)
    {
        return view('test.box_pesan', compact('id', 'nama'));
    }

    public function bukaDriver($id)
    {
        $checkout = Checkout::select('orders_id')
                        ->where('message', 'Verified')
                        ->where('driver_id', $id)
                        ->get();

        $checkout_id = Checkout::select('id')
                        ->where('message', 'Verified')
                        ->where('driver_id', $id)
                        ->get();

        $id = $checkout_id[0]->id;
        $order = Order::find($checkout[0]->orders_id);
        
        $nama = User::find($order->user_id)->name;
        $id = Tracking::select('id')
                        ->where('checkout_id', $checkout_id[0]->id)
                        ->get();
        $id = $id[0]->id;
        // return $id;
        return view('test.box_pesan', compact('id', 'nama'));
    }

    public function readChat($id)
    {
        $chattings = Chatting::all()->where('track_id', $id);
        
        $checkout_id = Tracking::find($id)->checkout_id;
        
        $order_id = Checkout::find($checkout_id)->orders_id;

        $shipper_id = Order::find($order_id)->user_id;

        $driver_id = Tracking::find($id)->driver_id;


        if (Auth::user()->hasRole('shipper')) {
            $target_avatar = User::find($driver_id)->avatar;
            $own_avatar = User::find($shipper_id)->avatar;
        }
        else {
            $target_avatar = User::find($shipper_id)->avatar;
            $own_avatar = User::find($driver_id)->avatar;
        }
        return view('test.isi_pesan', compact('chattings', 'target_avatar', 'own_avatar'));
    }
}
