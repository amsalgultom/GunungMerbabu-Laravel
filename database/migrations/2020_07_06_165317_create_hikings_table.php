<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHikingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hikings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('nik', 16)->unique();
            $table->string('nama');
            $table->enum('jk', ['L', 'P']);
            $table->string('umur');
            $table->string('alamat');
            $table->date('tgl_naik');
            $table->date('tgl_turun');
            $table->string('no_telp');
            $table->integer('id_jalur')->unsigned();
            $table->string('image');
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
        Schema::dropIfExists('hikings');
    }
}
