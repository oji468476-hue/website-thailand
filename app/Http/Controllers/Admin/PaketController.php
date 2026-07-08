<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PaketController extends Controller
{
    public function index()
    {
        $pakets = Paket::latest()->get();
        return view('admin.pakets.index', compact('pakets'));
    }

    public function create()
    {
        return view('admin.pakets.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'kuota' => 'required|integer',
        ]);

        Paket::create($request->only('nama_paket', 'deskripsi', 'harga', 'kuota'));

        return redirect()->route('admin.pakets.index')->with('success', 'Paket berhasil ditambahkan.');
    }

    public function edit(Paket $paket)
    {
        return view('admin.pakets.edit', compact('paket'));
    }

    public function update(Request $request, Paket $paket)
    {
        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'kuota' => 'required|integer',
        ]);

        $paket->update($request->only('nama_paket', 'deskripsi', 'harga', 'kuota'));

        return redirect()->route('admin.pakets.index')->with('success', 'Paket berhasil diperbarui.');
    }

public function destroy(Paket $paket)
{
    if ($paket->foto) {

        Storage::disk('public')
            ->delete($paket->foto);

    }

    $paket->delete();

    return redirect()
        ->route('admin.pakets.index')
        ->with('success', 'Paket berhasil dihapus');
}
}