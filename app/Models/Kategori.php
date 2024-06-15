<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $guarded = ['id'];

    function Post() {
        return $this->hasMany(Post::class);

    }

    function Produk() {
        return $this->hasMany(Produk::class);
        
    }
}
