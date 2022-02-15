<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;
use App\Models\User;
class Berita extends Model
{
    use HasFactory;
    protected $table = 'beritas';
    protected $fillable =
    [
        'title',
        'slug',
        'body',
        'image',
        'author',
        'kategori_id'
    ];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
