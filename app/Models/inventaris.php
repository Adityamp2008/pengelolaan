<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    protected $table = 'inventaris';
    protected $fillable = [
        'nama_barang',
        'kategori_id',
        'lokasi_id',
        'kondisi',
        'status',
        'tanggal_perolehan'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }
}

