<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vaksinator extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'vaksinator';

    protected $fillable = [
        'nama',
    ];

    public function jadwal()
    {
        return $this->hasMany('App\Models\JadwalVaksinasi', 'vaksinator_id', 'id');
    }
}
