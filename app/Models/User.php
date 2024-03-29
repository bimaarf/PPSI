<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;
use App\Models\RoleUser;
use App\Models\UserStatus;
use App\Models\Berita;
use App\Models\Jalur;
class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'telp',
        'alamat',
        'avatar',
        'status_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function jenis()
    {
      return $this->hasMany(RoleUser::class);
    }
    public function status()
    {
      return $this->belongsTo(UserStatus::class);
    }
    public function berita()
    {
      return $this->belongsTo(Berita::class);
    }
    public function jalurs()
    {
      return $this->belongsTo(Jalur::class);
    }
}
