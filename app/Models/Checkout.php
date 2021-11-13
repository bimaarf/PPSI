<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Order;
use App\Models\Chatting;
use App\Models\Tracking;

class Checkout extends Model
{
    use HasFactory;
    protected $fillable = [
        'message',
        'driver_id',
        'orders_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function orders()
    {
        return $this->belongsTo(Order::class);
    }
    public function chatting()
    {
        return $this->belongsTo(Chatting::class);
    }
    public function trackings()
    {
        return $this->belongsTo(Tracking::class);
    }
}
