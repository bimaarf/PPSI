<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
class AdminActivity extends Model
{
    use HasFactory;
    protected $table = 'admin_activity';

    public function getCreatedAtAttribute()
    {
        return \Carbon\Carbon::parse($this->attributes['created_at'])
       ->diffForHumans();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
