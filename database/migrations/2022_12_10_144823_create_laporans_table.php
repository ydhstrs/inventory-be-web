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
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_zona');
            $table->foreignId('id_kota')->nullable();
            $table->foreignId('id_jenis_bencana');
            $table->string('nama_kota')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('alamat')->nullable();    
            $table->string('status_laporan')->default(0);    
            $table->string('foto_brg_keluar')->nullable();    
            $table->string('foto_brg_kembali')->nullable();    
            $table->date('tgl_laporan')->nullable();    
            $table->date('tgl_brg_keluar')->nullable();    
            $table->date('tgl_brg_terima')->nullable();    
            $table->date('tgl_brg_kembali')->nullable();    
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
        Schema::dropIfExists('laporans');
    }
};
