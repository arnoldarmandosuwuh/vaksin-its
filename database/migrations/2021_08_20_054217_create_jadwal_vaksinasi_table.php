<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalVaksinasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_vaksinasi', function (Blueprint $table) {
            $table->id();
            $table->date('pendaftaran_mulai');
            $table->date('pendaftaran_selesai');
            $table->date('pelaksanaan');
            $table->time('sesi_mulai');
            $table->time('sesi_selesai');
            $table->string('lokasi');
            $table->string('penyelenggara')->default('Internal');
            $table->integer('kuota');
            $table->foreignId('vaksinator_id')->nullable()->references('id')->on('vaksinator')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('vaksin_id')->nullable()->references('id')->on('jenis_vaksin')->constrained()->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('jadwal_vaksinasi');
    }
}
