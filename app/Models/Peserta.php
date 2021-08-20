<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Peserta extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'peserta';

    protected $fillable = [
        'jadwal_vaksin_id',
        'pegawai_id',
        'hadir',
        'vaksin_ke',
        'tanggal_vaksin',
        'tanggal_kembali',
    ];

    public function pegawai()
    {
        return $this->belongsTo('App\Models\Pegawai', 'pegawai_id', 'id');
    }

    public function jadwal()
    {
        return $this->belongsTo('App\Models\JadwalVaksinasi', 'jadwal_vaksin_id', 'id');
    }
}
