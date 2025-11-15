<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalPerbaikan extends Model
{
    use HasFactory;

    protected $table = 'jadwal_perbaikan';

    protected $fillable = ['kerusakan_id', 'jadwal', 'status'];

    public function kerusakan()
    {
        return $this->belongsTo(Kerusakan::class);
    }

    public function pemeliharaan()
    {
        return $this->hasOne(Pemeliharaan::class, 'jadwal_id');
    }
}
