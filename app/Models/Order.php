<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use App\Models\User;
use App\Models\Checkout;
use App\Models\FeedManager;
class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'armada',
        'jadwal',
        'jemput',
        'telp_jemput',
        'alamat_jemput',
        'feed_m',
        'nama_barang',
        'jenis_barang',
        'tujuan',
        'telp_tujuan',
        'total',
        'alamat_tujuan',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
            ->translatedFormat('l, d F Y');
    }
    public function checkout()
    {
        return $this->hasMany(Checkout::class);
    }
    public function feedManager()
    {
        return $this->hasMany(FeedManager::class);
    }
}
