<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JadwalVaksinasi extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'jadwal_vaksinasi';

    protected $fillable = [
        'pendaftaran_mulai',
        'pendaftaran_selesai',
        'pelaksanaan',
        'sesi_mulai',
        'sesi_selesai',
        'lokasi',
        'kuota',
        'vaksinator_id',
        'vaksin_id',
    ];

    public function vaksinator()
    {
        return $this->belongsTo('App\Models\Vaksinator', 'vaksinator_id', 'id');
    }
    
    public function vaksin()
    {
        return $this->belongsTo('App\Models\JenisVaksin', 'vaksin_id', 'id');
    }

    public function peserta()
    {
        return $this->hasMany('App\Models\Peserta', 'jadwal_vaksin_id', 'id');
    }
}
