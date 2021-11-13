<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Checkout;
use App\Models\Chatting;
use App\Models\TrackingStatus;

class Tracking extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'checkout_id',
        'driver_id'
    ];
    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['updated_at'])
       ->diffForHumans();
    }
    public function user()
    {
        return $this->hasMany(User::class);
    }
    public function checkout()
    {
        return $this->belongsTo(Checkout::class);
    }
    public function chatting()
    {
        return $this->belongsTo(Chatting::class);
    }
   public function tstatus()
   {
       return $this->belongsTo(TrackingStatus::class);
   }
}
