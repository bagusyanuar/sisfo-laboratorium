<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemeriksaan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemeriksaan', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('no_lab');
            $table->bigInteger('pasien_id')->unsigned();
            $table->bigInteger('dokter_id')->unsigned()->nullable();
            $table->string('rm')->default('');
            $table->string('asal_jaringan')->default('');
            $table->string('diagnosa')->default('');
            $table->date('tanggal_spesimen_terima')->nullable();
            $table->date('tanggal_spesimen_jawab')->nullable();
            $table->string('makroskopis')->default('');
            $table->string('mikroskopis')->default('');
            $table->string('status')->default('menunggu
            ');
            $table->timestamps();
            $table->foreign('pasien_id')->references('id')->on('users');
            $table->foreign('dokter_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemeriksaan');
    }
}
