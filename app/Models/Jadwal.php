<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jadwals';

    protected $fillable = [
        'id_booking',
        'tanggal_berangkat',
        'status'
    ];
}