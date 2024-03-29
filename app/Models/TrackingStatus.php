<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tracking;

class TrackingStatus extends Model
{
    use HasFactory;
    protected $table = 'tracking_status';
    
    public function track()
    {
        return $this->belongsTo(Tracking::class);
    }
}
