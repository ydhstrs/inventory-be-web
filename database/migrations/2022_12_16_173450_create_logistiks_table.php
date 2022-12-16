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
        Schema::create('logistiks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kota');
            $table->string('nama_logistik');
            $table->integer('jumlah_logistik')->nullable();
            $table->string('foto_logistik')->nullable();
            $table->date('tahun_logistik')->nullable();
            $table->string('keterangan_logistik')->nullable();
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
        Schema::dropIfExists('logistiks');
    }
};
