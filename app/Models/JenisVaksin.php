<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisVaksin extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'jenis_vaksin';

    protected $fillable = [
        'nama',
    ];

    public function jadwal()
    {
        return $this->hasMany('App\Models\JadwalVaksinasi', 'vaksin_id', 'id');
    }
}
