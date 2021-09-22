<?php

namespace App\Models;
use App\Models\Path;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;
    protected $fillable = [
        'zone'
    ];
    public function path()
    {
        return $this->belongsTo(Path::class);
    }
}
