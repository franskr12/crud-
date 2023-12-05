<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // Di dalam fungsi up() pada create_barang_table.php
public function up()
{
    Schema::create('barang', function (Blueprint $table) {
        $table->id();
        $table->string('nama_barang');
        $table->integer('stok');
        $table->integer('jumlah_terjual');
        $table->date('tanggal_transaksi');
        $table->string('jenis_barang');
        // Tambahkan kolom lain sesuai kebutuhan
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
