<?php

namespace App\Http\Livewire;

use App\Models\Chatting;
use App\Models\Checkout;
use App\Models\Order;
use App\Models\Tracking;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Message extends Component
{
    public $sender;
    public $inbox;
    public $baca = "d-none";

    public $messages;
    public $target_avatar;
    public $own_avatar;
    public $pesan;
    public $track_id;
    public $chats;

    public function render()
    {
        $chats = $this->chats;
        $sender = $this->sender;
        $inbox = $this->inbox;
        $baca = $this->baca;
        $messages = $this->messages;
        $pesan = $this->pesan;
        $target_avatar = $this->target_avatar;
        $own_avatar = $this->own_avatar;

        if (Auth::user()->hasRole('driver')) {

            $id = Auth::id();
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

            $user = User::find($order->user_id)->name;
            $id = Tracking::select('id')
                                ->where('checkout_id', $checkout_id[0]->id)
                                ->get();
            $id = $id[0]->id;

            $this->sender = $user;
            $this->track_id = $id;
        }

        return view('livewire.message', compact('chats', 'sender', 'inbox', 'baca', 'messages', 'pesan', 'target_avatar', 'own_avatar'));
    }

    public function inbox($id)
    {
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
        $this->chats = $chats;
    }


    public function bukaChat($chats)
    {
        $user = $chats['nama_driver'];
        $id = $chats['track_id'];

        $this->inbox = "d-none";
        $this->baca = "";
        $this->sender = $user;
        $this->track_id = $id;

    }

    public function tutupChat()
    {
        $this->inbox = NULL;
        $this->baca = "d-none";
        $this->messages = NULL;
        $this->target_avatar = NULL;
        $this->own_avatar = NULL;
    }

    public function bacaChat()
    {
        $this->messages = Chatting::all()->where('track_id', $this->track_id);
        if (is_countable($this->messages) && count($this->messages) > 0) {

            $checkout_id = Tracking::find($this->track_id)->checkout_id;

            $order_id = Checkout::find($checkout_id)->orders_id;

            $shipper_id = Order::find($order_id)->user_id;

            $driver_id = Tracking::find($this->track_id)->driver_id;


            if (Auth::user()->hasRole('shipper')) {
                $this->target_avatar = User::find($driver_id)->avatar;
                $this->own_avatar = User::find($shipper_id)->avatar;
            }
            else {
                $this->target_avatar = User::find($shipper_id)->avatar;
                $this->own_avatar = User::find($driver_id)->avatar;
            }
        }
    }

    public function kirimPesan()
    {
        $chat               = new Chatting();
        $chat->chat         = $this->pesan;
        $chat->user_id      = Auth::id();
        $chat->track_id     = $this->track_id;
        $chat->save();

        $this->reset(['pesan']);
    }
}
