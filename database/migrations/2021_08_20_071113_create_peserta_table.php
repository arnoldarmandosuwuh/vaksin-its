<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesertaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peserta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jadwal_vaksin_id')->nullable()->references('id')->on('jadwal_vaksinasi')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('pegawai_id')->nullable()->references('id')->on('pegawai')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('hadir')->default(0);
            $table->integer('vaksin_ke');
            $table->date('tanggal_vaksin');
            $table->date('tanggal_kembali')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peserta');
    }
}
