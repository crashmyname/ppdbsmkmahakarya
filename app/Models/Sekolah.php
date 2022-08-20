<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;
    protected $fillable = [
        'npsn',
        'nama_sekolah',
        'alamat',
        'kelurahan',
        'status',
        // 'propinsi',
        // 'kode_kab_kota',
        // 'kabupaten_kota',
        // 'kode_kec',
        // 'kecamatan',
        // 'id',
        // 'npsn',
        // 'sekolah',
        // 'bentuk',
        // 'status',
        // 'alamat_jalan',
        // 'lintang',
        // 'bujur'
    ];
}
