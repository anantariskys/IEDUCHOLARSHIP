<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beasiswas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('asal_negara');
            $table->date('mulai_tanggal');
            $table->date('deadline_tanggal');
            $table->text('syarat_ketentuan');
            $table->string('link_pendaftaran');
            $table->string('gambar');
            $table->integer('tipe_id');
            $table->integer('jenjang_id');
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
        Schema::dropIfExists('beasiswas');
    }
};