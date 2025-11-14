<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Inventaris;
use App\Models\User;

class Peminjaman extends Model
{
    use HasFactory;

    protected $table = 'peminjaman';

    protected $fillable = [
        'user_id',
        'inventaris_id',
        'tanggal_pinjam',
        'tanggal_kembali',
        'status',
        'keterangan',
    ];

    // Barang yang dipinjam
    public function user()
{
    return $this->belongsTo(User::class);
}

public function inventaris()
{
    return $this->belongsTo(\App\Models\Inventaris::class, 'inventaris_id');
}

}
