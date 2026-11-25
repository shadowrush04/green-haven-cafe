<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'kategori_id',
        'kode_menu',
        'nama_menu',
        'harga',
        'status',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function pesanans()
    {
        return $this->hasMany(Pesanan::class);
    }
}