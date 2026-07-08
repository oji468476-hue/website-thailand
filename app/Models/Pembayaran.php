<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    // Nama tabel khusus karena tidak mengikuti konvensi jamak bahasa Inggris
    protected $table = 'pembayarans';

    // Kolom yang boleh diisi massal
    protected $fillable = [
    'booking_id',
    'proof_image',
    'payment_method',
    'status',
    'verified_by',
];

    // Relasi ke booking
    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    // Relasi ke user (admin) yang memverifikasi
    public function verifier()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }
}