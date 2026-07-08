<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'pakets';

    protected $fillable = [
        'nama_paket',
        'deskripsi',
        'harga',
        'kuota',
        'foto',
        'mitra_id'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELASI
    |--------------------------------------------------------------------------
    */

    public function mitra()
    {
        return $this->belongsTo(User::class, 'mitra_id');
    }

public function bookings()
{
    return $this->hasMany(
        Booking::class,
        'package_id', // foreign key di tabel bookings
        'id'
    );
}
}