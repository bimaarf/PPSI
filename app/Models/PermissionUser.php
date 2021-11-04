<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;

class PermissionUser extends Model
{
    use HasFactory;
    protected $table = 'permission_user';
    public function permission()
    {
        return $this->belongsTo(Permission::class);
    }
}
