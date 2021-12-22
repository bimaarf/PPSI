<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverArmada extends Model
{
    use HasFactory;
    protected $table    ='d_armada';

    public function armada()
    {
        return $this->belongsTo(Armada::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
