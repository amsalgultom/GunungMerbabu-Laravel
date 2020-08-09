<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableJalur extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jalur', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_jalur', 20);
            $table->string('jarak');
            $table->string('wilayah');
            $table->timestamps();
        });

        // Set FK di kolom is_jalur di tabel siswa.
        Schema::table('hikings', function (Blueprint $table) {
            $table->foreign('id_jalur')
                  ->references('id')
                  ->on('jalur')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('hikings', function (Blueprint $table) {
            $table->dropForeign('hikings_id_jalur_foreign');
        });

        Schema::dropIfExists('jalur');
    }

    
}
