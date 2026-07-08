<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;

class MitraController extends Controller
{
    public function dashboard()
    {
        $paket = Paket::where('mitra_id', Auth::id())->get();

        $booking = Booking::whereHas('paket', function($q){
            $q->where('mitra_id', Auth::id());
        })->get();

        $pendapatan = $booking
            ->where('status', 'confirmed')
            ->sum('total_price');

        return view('mitra.dashboard', compact(
            'paket',
            'booking',
            'pendapatan'
        ));
    }

    public function bookings()
    {
        $bookings = Booking::whereHas('paket', function($q){
            $q->where('mitra_id', Auth::id());
        })->latest()->get();

        return view('mitra.bookings', compact('bookings'));
    }
}