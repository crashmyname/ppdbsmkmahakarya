<?php

namespace App\Models\Siswa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataPendidikan extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'jns_pendaftaran',
        'jalur_pendaftaran',
        'nama_sekolah',
        'stts_sekolah',
        'alamat_sekolah',
        'jurusan',
        'jns_kelas'
];
}
