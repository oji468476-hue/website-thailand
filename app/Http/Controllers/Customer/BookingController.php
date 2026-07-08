<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // Form booking
public function create($paketId)
{
    $paket = Paket::findOrFail($paketId);

    if ($paket->kuota <= 0) {

        return redirect()
            ->route('detail', $paket->id)
            ->with(
                'error',
                'Maaf, kuota paket sudah habis.'
            );
    }

    return view(
        'customer.booking.create',
        compact('paket')
    );
}

    // Simpan booking
   public function store(Request $request)
{
    $request->validate([
        'paket_id' => 'required|exists:pakets,id',
        'departure_date' => 'required|date|after:today',
        'participants' => 'required|integer|min:1',
    ]);

    $paket = Paket::findOrFail($request->paket_id);

    /*
    |--------------------------------------------------------------------------
    | Cek Kuota
    |--------------------------------------------------------------------------
    */

    if ($request->participants > $paket->kuota) {

        return back()
            ->withInput()
            ->with(
                'error',
                'Kuota tidak mencukupi. Sisa kuota hanya '.$paket->kuota.' orang.'
            );

    }

    /*
    |--------------------------------------------------------------------------
    | Hitung Total
    |--------------------------------------------------------------------------
    */

    $total = $paket->harga * $request->participants;

    /*
    |--------------------------------------------------------------------------
    | Simpan Booking
    |--------------------------------------------------------------------------
    */

    $booking = Booking::create([
        'user_id' => Auth::id(),
        'package_id' => $request->paket_id,
        'departure_date' => $request->departure_date,
        'participants' => $request->participants,
        'total_price' => $total,
        'status' => 'pending',
    ]);

    /*
    |--------------------------------------------------------------------------
    | Kurangi Kuota Paket
    |--------------------------------------------------------------------------
    */

    $paket->decrement(
        'kuota',
        $request->participants
    );

    /*
    |--------------------------------------------------------------------------
    | Redirect Pembayaran
    |--------------------------------------------------------------------------
    */

    return redirect()
        ->route(
            'customer.pembayaran.create',
            $booking->id
        )
        ->with(
            'success',
            'Booking berhasil dibuat. Silakan lanjutkan pembayaran.'
        );
}

    // Riwayat booking
    public function history()
{
    $bookings = Booking::where('user_id', Auth::id())
        ->with('paket')
        ->latest()
        ->get();

    return view('customer.booking.history', compact('bookings'));
}
}