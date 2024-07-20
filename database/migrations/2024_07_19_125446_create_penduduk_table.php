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
            $table->id(); // Primary key dengan auto-increment
            $table->string('nik')->unique(); // NIK sebagai unique identifier
            $table->string('nama');
            $table->enum('jenis_kelamin', ['laki-laki', 'perempuan']);
            $table->string('pendidikan')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->UnsignedbigInteger('kartu_keluarga_id')->cnstrained(); // Foreign key ke tabel kartu_keluarga
            $table->enum('status', ['aktif', 'meninggal', 'masuk', 'keluar', 'lahir'])->default('aktif');
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('kartu_keluarga_id')->references('id')->on('kartu_keluarga')->onDelete('cascade'); // Menentukan foreign key constraint
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
