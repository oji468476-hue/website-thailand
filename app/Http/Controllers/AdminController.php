<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Paket;
use App\Models\Booking;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $totalPaket = Paket::count();
        $bookingPending = Booking::where('status', 'pending')->count();
        $transaksi = Booking::where('status', 'confirmed')->sum('total_price');

        return view('admin.dashboard', compact('totalUsers', 'totalPaket', 'bookingPending', 'transaksi'));
    }

    public function verifikasi()
    {
        $pembayarans = Pembayaran::with('booking.user', 'booking.paket')
            ->where('status', 'pending')
            ->latest()
            ->get();

        return view('admin.verifikasi', compact('pembayarans'));
    }

    public function verifikasiStore(Request $request, $id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        $pembayaran->update([
            'status' => 'verified',
            'verified_by' => auth()->id(),
        ]);
        $pembayaran->booking->update(['status' => 'confirmed']);

        return back()->with('success', 'Pembayaran berhasil diverifikasi.');
    }

    public function tolakPembayaran($id)
{
    $pembayaran = Pembayaran::with('booking.paket')
        ->findOrFail($id);

    /*
    |--------------------------------------------------------------------------
    | Kembalikan Kuota
    |--------------------------------------------------------------------------
    */

    $booking = $pembayaran->booking;

    if ($booking && $booking->paket) {

        $booking->paket->increment(
            'kuota',
            $booking->participants
        );

        $booking->update([
            'status' => 'rejected'
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Tolak Pembayaran
    |--------------------------------------------------------------------------
    */

    $pembayaran->update([
        'status' => 'rejected',
        'verified_by' => auth()->id(),
    ]);

    return back()->with(
        'success',
        'Pembayaran ditolak dan kuota berhasil dikembalikan.'
    );
}
}