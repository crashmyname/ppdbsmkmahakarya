<?php

namespace App\Models\Siswa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataPembayaran extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'nama_siswa',
        'jurusan',
        'total_biaya',
        'bukti',
    ];
}
