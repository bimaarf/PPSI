<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\RoleUser;

class RoleModel extends Model
{
    use HasFactory;
    protected $table = 'roles';
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function roleUser()
    {
        return $this->hasMany(RoleUser::class);
    }
}
