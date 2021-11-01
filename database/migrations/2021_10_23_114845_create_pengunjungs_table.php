<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengunjungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengunjung', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->string('nama', 30);
            $table->string('nik', 16);
            $table->date('tgl_lahir')->nullable();
            $table->enum('jk', ['L', 'P'])->nullable()->comment('L untuk Laki-laki, P untuk Perempuan');
            $table->string('asal', 50);

            //$table->bigInteger('kode_kamar')->unsigned();
            //$table->foreign('kode_kamar')->references('kode')->on('kamar')->onDelete('cascade');
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
        Schema::dropIfExists('pengunjung');
    }
}
