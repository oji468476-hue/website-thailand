<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use App\Models\Paket;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | CUSTOMER DASHBOARD
    |--------------------------------------------------------------------------
    */

  public function customer()
{
    $bookings = Booking::with('pembayaran')
        ->where('user_id', auth()->id())
        ->get();

    $pakets = Paket::latest()
        ->take(3)
        ->get();

    return view(
        'dashboard.customer',
        compact(
            'bookings',
            'pakets'
        )
    );
}
    
    /*
    |--------------------------------------------------------------------------
    | ADMIN DASHBOARD
    |--------------------------------------------------------------------------
    */

    public function admin()
    {
        $totalUsers = User::count();

        $totalPaket = Paket::count();

        $bookingPending = Booking::where('status', 'pending')->count();

        $transaksi = Booking::where('status', 'confirmed')
            ->sum('total_price');

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalPaket',
            'bookingPending',
            'transaksi'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | MITRA DASHBOARD
    |--------------------------------------------------------------------------
    */

    public function mitra()
    {
        $totalPaket = Paket::where('mitra_id', auth()->id())
            ->count();

        $bookingMasuk = Booking::whereHas('paket', function ($q) {
            $q->where('mitra_id', auth()->id());
        })->count();

        $pendapatan = Booking::whereHas('paket', function ($q) {
            $q->where('mitra_id', auth()->id());
        })
        ->where('status', 'confirmed')
        ->sum('total_price');

        $pakets = Paket::where('mitra_id', auth()->id())
            ->latest()
            ->get();

         $bookingTerbaru = Booking::with(['user','paket'])
    ->whereHas('paket', function ($q) {
        $q->where('mitra_id', auth()->id());
    })
    ->latest()
    ->take(5)
    ->get();

$paketTerlaris = Paket::where('mitra_id', auth()->id())
    ->withCount('bookings')
    ->orderByDesc('bookings_count')
    ->take(5)
    ->get();

       return view('dashboard.mitra', compact(
    'totalPaket',
    'bookingMasuk',
    'pendapatan',
    'pakets',
    'bookingTerbaru',
    'paketTerlaris'
));
    }

    /*
    |--------------------------------------------------------------------------
    | BOOKING MASUK MITRA
    |--------------------------------------------------------------------------
    */

    public function bookingMitra()
    {
        $bookings = Booking::with([
                'user',
                'paket'
            ])
            ->whereHas('paket', function ($q) {
                $q->where('mitra_id', auth()->id());
            })
            ->latest()
            ->get();

        return view('mitra.bookings', compact('bookings'));
    }
    public function pendapatanMitra()
{
    $bookings = Booking::with([
        'user',
        'paket'
    ])
    ->whereHas('paket', function ($q) {

        $q->where('mitra_id', auth()->id());

    })
    ->where('status', 'confirmed')
    ->latest()
    ->get();

    $totalPendapatan = $bookings->sum('total_price');

    return view(
        'mitra.pendapatan',
        compact(
            'bookings',
            'totalPendapatan'
        )
    );
}
}