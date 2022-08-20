<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatasiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_siswas', function (Blueprint $table) {
            $table->id('id_siswa');
            $table->string('nisn',12);
            $table->string('nama_lengkap',50);
            $table->string('jenis_kelamin',10);
            $table->string('tempat_lahir',30);
            $table->dateTime('tanggal_lahir');
            $table->string('agama',16);
            $table->string('alamat',50);
            $table->string('rt',4);
            $table->string('rw',4);
            $table->string('kelurahan',15);
            $table->string('kecamatan',15);
            $table->string('kabupaten',15);
            $table->string('provinsi',15);
            $table->string('no_telp',13);
            $table->string('email',30);
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
        Schema::dropIfExists('datasiswas');
    }
}
