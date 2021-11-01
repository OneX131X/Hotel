<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = ['id', 'kode_transaksi', 'pengunjung_id', 'kode_kamar', 'tgl_checkin', 'tgl_checkout', 'status', 'keterangan'];
}
