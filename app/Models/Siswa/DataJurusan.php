<?php

namespace App\Models\Siswa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataJurusan extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'nama_jurusan',
    ];
}
