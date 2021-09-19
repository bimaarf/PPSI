<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'provinsi_a',
        'kab_kota_a',
        'telp_a',
        'alamat_a',
        'armada',
        'jadwal',
        'multi',
        'jenis_barang',
        'jumlah_barang',
        'panjang',
        'lebar',
        'tinggi',
        'provinsi_b',
        'kab_kota_b',
        'telp_b',
        'total',
        'alamat_b',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
