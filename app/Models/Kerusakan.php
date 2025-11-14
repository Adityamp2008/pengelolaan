<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kerusakan extends Model
{
    protected $fillable = [
        'user_id','nama_barang','lokasi','deskripsi_kerusakan','status'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

