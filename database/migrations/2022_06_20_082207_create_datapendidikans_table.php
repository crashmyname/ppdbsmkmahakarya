<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatapendidikansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_pendidikans', function (Blueprint $table) {
            $table->id('id');
            $table->string('jns_pendaftaran',10);
            $table->string('jalur_pendaftaran',10);
            $table->string('nama_sekolah',50);
            // $table->string('stts_sekolah',);
            $table->string('alamat_sekolah',50);
            $table->string('jurusan',40);
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
        Schema::dropIfExists('datapendidikans');
    }
}
