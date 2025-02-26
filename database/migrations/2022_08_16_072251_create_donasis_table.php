<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('jenis_id');
            $table->date('tanggal');
            $table->string('nama');
            $table->string('telp')->nullable();
            $table->string('jumlah')->nullable();
            $table->string('jumlah_saldo')->nullable();
            $table->string('keluar')->nullable();
            $table->string('ket')->nullable();
            $table->string('pesan')->nullable();
            $table->string('bukti_donasi')->nullable();
            $table->string('saldo')->nullable();
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
        Schema::dropIfExists('donasis');
    }
}
