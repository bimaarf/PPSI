<?php

namespace App\Models;
use App\Models\Zone;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Path extends Model
{
    use HasFactory;
    protected $fillable = [
        'path'
    ];
    public function zone()
    {
        return $this->hasMany(Zone::class);
    }
}
