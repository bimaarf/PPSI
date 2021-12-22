<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverJalur extends Model
{
    use HasFactory;
    protected $table    = 'd_jalur';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
