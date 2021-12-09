<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\Order;
use App\Models\Tracking;
use App\Models\TrackingStatus;
use App\Models\User;
use App\Models\Chatting;
use Illuminate\Support\Facades\Auth;
use App\Models\RoleUser;
use Illuminate\Support\Facades\DB;

class TrackingController extends Controller
{
    public function tracking(Request $request, $id)
    {
        $orders = Order::find($id);
        $checkout = Checkout::orderBy('id', 'ASC')->get();
        $tracking = Tracking::orderBy('id', 'ASC')->get();
        $track_status = TrackingStatus::orderBy('id', 'ASC')->get();
        $users   = User::all();
        // chatting
        $chatting = Chatting::all();
        $driver   = Auth::user();
        $role_driver = RoleUser::where('role_id', '2')->get();

        $pesananSaya = DB::table('orders')->count();
        $pesananDiproses = DB::table('orders')->where('status', 'Process')->count();
        $pesananDibatalkan = DB::table('orders')->where('status', 'Canceled')->count();
        $pesananSelesai = DB::table('orders')->where('status', 'Finished')->count();

        return view('orders.tracking', compact('checkout', 'orders', 'tracking', 'users', 'track_status', 'chatting', 'driver', 'role_driver', 'pesananSaya', 'pesananDiproses', 'pesananDibatalkan', 'pesananSelesai'));
    }
    public function timeline(Request $request, $id)
    {
        $orders = Order::find($id);
        $checkout = Checkout::all();
        $tracking = Tracking::orderBy('id', 'ASC')->get();
        $track_status = TrackingStatus::orderBy('id', 'ASC')->get();
        $users   = User::all();
        // chatting
        $chatting = Chatting::all();
        $driver   = Auth::user();
        $role_driver = RoleUser::where('role_id', '2')->get();

        return view('orders.proses.timeline', compact('checkout', 'orders', 'tracking', 'users', 'track_status', 'chatting', 'driver', 'role_driver'));
    }

    public function prosesTrack(Request $request, $id)
    {
        $orders = Order::find($id);
        $checkout = Checkout::all();
        $tracking = Tracking::orderBy('id', 'ASC')->get();
        $track_status = TrackingStatus::orderBy('id', 'ASC')->get();
        $users   = User::all();
        // chatting
        $chatting = Chatting::all();
        $driver   = Auth::user();
        $role_driver = RoleUser::where('role_id', '2')->get();

        return view('orders.proses.proses_track', compact('checkout', 'orders', 'tracking', 'users', 'track_status', 'chatting', 'driver', 'role_driver'));
    }
    public function modalTrack(Request $request, $id)
    {
        $orders = Order::find($id);
        $checkouts = Checkout::all();
        $tracking = Tracking::orderBy('id', 'ASC')->get();
        $track_status = TrackingStatus::orderBy('id', 'ASC')->get();
        $users   = User::all();
        // chatting
        $chatting = Chatting::all();
        $driver   = Auth::user();
        $role_driver = RoleUser::where('role_id', '2')->get();

        return view('user.modal.elements.modal_track', compact('checkouts', 'orders', 'tracking', 'users', 'track_status', 'chatting', 'driver', 'role_driver'));
    }
    public function timelineModal(Request $request, $id)
    {
        $orders = Order::find($id);
        $checkout = Checkout::all();
        $tracking = Tracking::orderBy('id', 'ASC')->get();
        $track_status = TrackingStatus::orderBy('id', 'ASC')->get();
        $users   = User::all();
        // chatting
        $chatting = Chatting::all();
        $driver   = Auth::user();
        $role_driver = RoleUser::where('role_id', '2')->get();

        return view('user.modal.elements.timeline_modal', compact('checkout', 'orders', 'tracking', 'users', 'track_status', 'chatting', 'driver', 'role_driver'));
    }
    
}
