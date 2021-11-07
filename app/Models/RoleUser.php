<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RoleModel;
class RoleUser extends Model
{
    use HasFactory;
    protected $table = 'role_user';
    protected $fillable = [
        'role_id',
        'user_id',
        'user_type'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function roles()
    {
        return $this->belongsTo(RoleModel::class);
    }

   
}
