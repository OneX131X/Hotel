<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengunjung extends Model
{
    protected $table = 'pengunjung';
    protected $fillable = ['id', 'user_id', 'nama', 'nik', 'tgl_lahir', 'jk', 'asal', 'kode_kamar'];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'pengunjung_id', 'id');
    }

    public function kamar()
    {
        return $this->hasMany(Kamar::class, 'kode_kamar', 'kode');
    }
}
