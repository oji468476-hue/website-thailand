<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Booking extends Model
{
    protected $table = 'bookings';

    protected $fillable = [
        'user_id',
        'package_id',
        'departure_date',
        'participants',
        'total_price',
        'status',
    ];

    protected $casts = [
        'total_price' => 'decimal:2',
    ];

    /**
     * Accessor: selalu kembalikan objek Carbon, bahkan jika nilai di DB masih string.
     */
    public function getDepartureDateAttribute($value): ?Carbon
    {
        if (empty($value)) {
            return null;
        }

        if ($value instanceof Carbon) {
            return $value;
        }

        return Carbon::parse($value);
    }

    // Relasi
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paket()
    {
        return $this->belongsTo(Paket::class, 'package_id');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class);
    }
}