<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pemeliharaan extends Model    
{
    use HasFactory;

    protected $fillable = ['jadwal_id', 'pelaksanaan', 'histori_perawatan'];

    public function jadwal()
    {
        return $this->belongsTo(JadwalPerbaikan::class, 'jadwal_id');
    }
}
