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
            $table->bigIncrements('id');
            $table->string('no_kk', 16)->unique();
            $table->string('nama_kk');
            $table->enum('alamat', ['Dusun 1', 'Dusun 2']); // Alamat dengan pilihan enum
            $table->integer('rt');
            $table->integer('rw');
            $table->binary('scan_kk')->nullable(); // File scan KK (blob)

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
