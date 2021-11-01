<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_transaksi');

            $table->bigInteger('pengunjung_id')->unsigned();
            $table->foreign('pengunjung_id')->references('id')->on('pengunjung')->onDelete('cascade');

            $table->bigInteger('kode_kamar')->unsigned();
            $table->foreign('kode_kamar')->references('kode')->on('kamar')->onDelete('cascade');

            $table->date('tgl_checkin');
            $table->date('tgl_checkout');
            $table->enum('status', ['terisi', 'kosong']);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
