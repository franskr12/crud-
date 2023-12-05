<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang'; // Sesuaikan dengan nama tabel yang telah Anda buat

    protected $fillable = [
        'nama_barang',
        'stok',
        'jumlah_terjual',
        'tanggal_transaksi',
        'jenis_barang',
        // Tambahkan properti lain sesuai kebutuhan
    ];
}
