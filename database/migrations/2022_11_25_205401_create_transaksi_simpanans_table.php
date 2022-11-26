<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_simpanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nasabah_id');
            $table->foreignId('simpanan_id');
            $table->integer('nominal');
            $table->integer('saldo_total');
            $table->string('status');
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
        Schema::dropIfExists('transaksi_simpanans');
    }
};
