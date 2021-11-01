<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kamar extends Model
{
    protected $table = 'kamar';
    protected $fillable = ['kode', 'no_kamar', 'lantai', 'jenis_kamar'];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'kode_kamar', 'kode');
    }
}
