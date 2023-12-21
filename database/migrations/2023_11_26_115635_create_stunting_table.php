<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stunting', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->enum('kelamin', ['L', 'P'])->default('L');
            $table->date('tanggal_lahir');
            $table->string('nama_ortu');
            $table->string('kode_posyandu');
            $table->string('kode_dusun');
            $table->string('usia_ukur')->nullable();
            $table->timestamps();

            $table->foreign('kode_posyandu')->references('kode_posyandu')->on('posyandu');
            $table->foreign('kode_dusun')->references('kode_dusun')->on('dusun');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pasien_stunting');
    }
};
