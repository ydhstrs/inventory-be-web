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
        Schema::create('peralatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kota');
            $table->string('nama');
            $table->integer('jumlah')->nullable();
            $table->string('foto')->nullable();
            $table->string('kategori')->nullable();
            $table->string('sumber_dana_peralatan')->nullable();
            $table->date('tahun')->nullable();
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('peralatan');
    }
};
