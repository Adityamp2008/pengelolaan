<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori';
    protected $fillable = ['nama_kategori'];

    public function inventaris()
    {
        return $this->hasMany(Inventaris::class);
    }
}
