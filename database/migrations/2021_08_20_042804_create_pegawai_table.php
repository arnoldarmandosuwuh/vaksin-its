<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('jenis_kelamin');
            $table->string('nip');
            $table->string('golongan_darah');
            $table->string('nomor_hp');
            $table->string('status');
            $table->date('tanggal_lahir');
            $table->foreignId('users_id')->nullable()->references('id')->on('users')->constrained()->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('pegawai');
    }
}
