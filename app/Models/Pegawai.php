<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pegawai';

    protected $fillable = [
        'nik',
        'nip',
        'jenis_kelamin',
        'golongan_darah',
        'nomor_hp',
        'status',
        'tanggal_lahir',
        'users_id',
    ];

    public function users()
    {
        return $this->belongsTo('App\Models\User', 'users_id', 'id');
    }

    public function peserta()
    {
        return $this->hasMany('App\Models\Peserta', 'pegawai_id', 'id');
    }
}
