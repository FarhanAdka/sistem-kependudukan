<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendudukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penduduk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nik', 16)->unique();
            $table->string('nama');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('pendidikan');
            $table->string('pekerjaan');
            $table->string('nama_ayah');
            $table->string('nama_ibu');
            $table->string('no_kk', 16);
            $table->foreign('no_kk')->references('no_kk')->on('kartu_keluarga');
            $table->enum('status', ['aktif', 'meninggal', 'lahir', 'masuk', 'keluar']);
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('penduduk');
    }
}
