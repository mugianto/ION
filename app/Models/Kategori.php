<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $fillable = ['nama_kategori', 'slug_kategori'];
    public function artikels()
    {
        return $this->hasMany(Artikel::class, 'id_kategori');
    }
}
