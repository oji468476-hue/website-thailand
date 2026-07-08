<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\User;

class PaketController extends Controller
{
    public function index()
    {
        $paket = Paket::latest()->get();

        $totalPaket = Paket::count();

        $totalCustomer = User::where('role', 'customer')
            ->count();

        return view('home', compact(
            'paket',
            'totalPaket',
            'totalCustomer'
        ));
    }

    public function detail($id)
    {
        $paket = Paket::findOrFail($id);

        return view('detail', compact('paket'));
    }
}