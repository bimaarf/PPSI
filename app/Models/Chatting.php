<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Checkout;
use App\Models\Tracking;

class Chatting extends Model
{
    use HasFactory;
    protected $table = 'chattings';
    protected $fillable = [
        'chat',
        'user_id',
        'tracking_id'
    ];
    protected $hidden;
    
    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['updated_at'])
       ->diffForHumans();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function checkout()
    {
        return $this->belongsTo(Checkout::class);
    }
    public function tracking()
    {
        return $this->belongsTo((Tracking::class));
    }
}
