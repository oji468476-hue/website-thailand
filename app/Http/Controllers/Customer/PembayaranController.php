<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | LIST PEMBAYARAN
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $bookings = Booking::with([
            'paket',
            'pembayaran'
        ])
        ->where('user_id', Auth::id())
        ->latest()
        ->get();

        return view(
            'customer.pembayaran.index',
            compact('bookings')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | HALAMAN PEMBAYARAN
    |--------------------------------------------------------------------------
    */

    public function create($bookingId)
    {
        $booking = Booking::with([
            'paket',
            'pembayaran'
        ])
        ->where('user_id', Auth::id())
        ->findOrFail($bookingId);

        return view(
            'customer.pembayaran.create',
            compact('booking')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | SIMPAN PEMBAYARAN
    |--------------------------------------------------------------------------
    */

    public function store(Request $request, $bookingId)
    {
        $request->validate([
            'payment_method' => 'required',
            'proof_image'    => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $booking = Booking::where(
            'user_id',
            Auth::id()
        )->findOrFail($bookingId);

        /*
        |--------------------------------------------------------------------------
        | Upload Bukti
        |--------------------------------------------------------------------------
        */

        $path = $request->file('proof_image')
            ->store('payments', 'public');

        /*
        |--------------------------------------------------------------------------
        | Simpan Pembayaran
        |--------------------------------------------------------------------------
        */

        Pembayaran::updateOrCreate(
            [
                'booking_id' => $booking->id,
            ],
            [
                'proof_image'    => $path,
                'payment_method' => $request->payment_method,
                'status'         => 'pending',
            ]
        );

        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('customer.pembayaran.index')
            ->with(
                'success',
                'Bukti pembayaran berhasil diupload dan menunggu verifikasi admin.'
            );
    }
}