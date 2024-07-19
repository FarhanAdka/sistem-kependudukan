<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKartuKeluargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kartu_keluarga', function (Blueprint $table) {
            $table->id(); // Primary key autoincrement
            $table->string('no_kk')->unique(); // Nomor KK unik
            $table->string('nama_kk'); // Nama KK
            $table->enum('alamat', ['Dusun 1', 'Dusun 2']); // Alamat dengan pilihan enum
            $table->smallInteger('rt'); // RT
            $table->smallInteger('rw'); // RW
            $table->binary('scan_kk')->nullable();; // File scan KK (blob)

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
        Schema::dropIfExists('kartu_keluarga');
    }
}
