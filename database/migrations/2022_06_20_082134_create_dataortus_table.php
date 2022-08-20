<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataortusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_ortus', function (Blueprint $table) {
            $table->id('id_ortu');
            $table->string('nama_ayah',50);
            $table->string('tempat_lahir_ayah',30);
            $table->dateTime('tgl_lahir_ayah');
            $table->string('pendidikan_ayah',20);
            $table->string('pekerjaan_ayah',20);
            $table->string('penghasilan_ayah',30);
            $table->string('nama_ibu',50);
            $table->string('tempat_lahir_ibu',30);
            $table->dateTime('tgl_lahir_ibu');
            $table->string('pendidikan_ibu',20);
            $table->string('pekerjaan_ibu',20);
            $table->string('penghasilan_ibu',30);
            $table->string('nama_wali',50)->nullable();
            $table->string('tempat_lahir_wali',30)->nullable();
            $table->dateTime('tgl_lahir_wali')->nullable();
            $table->string('pendidikan_wali',20)->nullable();
            $table->string('pekerjaan_wali',20)->nullable();
            $table->string('penghasilan_wali',30)->nullable();
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
        Schema::dropIfExists('dataortus');
    }
}
