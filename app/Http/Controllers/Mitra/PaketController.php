<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PaketController extends Controller
{
    public function index()
    {
        $pakets = Paket::where('mitra_id', Auth::id())
            ->latest()
            ->get();

        return view('mitra.paket.index', compact('pakets'));
    }

    public function create()
    {
        return view('mitra.paket.create');
    }

public function store(Request $request)
{
    $request->validate([
        'nama_paket' => 'required',
        'deskripsi' => 'required',
        'harga' => 'required|numeric',
        'kuota' => 'required|numeric',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $foto = null;

    if ($request->hasFile('foto')) {
        $foto = $request->file('foto')
            ->store('pakets', 'public');
    }

    Paket::create([
        'nama_paket' => $request->nama_paket,
        'deskripsi' => $request->deskripsi,
        'harga' => $request->harga,
        'kuota' => $request->kuota,
        'foto' => $foto,
        'mitra_id' => Auth::id(),
    ]);

    return redirect()
        ->route('dashboard.mitra')
        ->with('success', 'Paket berhasil ditambahkan!');
}
    public function edit(Paket $paket)
    {
        if ($paket->mitra_id != Auth::id()) {
            abort(403);
        }

        return view('mitra.paket.edit', compact('paket'));
    }

public function update(Request $request, Paket $paket)
{
    if ($paket->mitra_id != Auth::id()) {
        abort(403);
    }

    $request->validate([
        'nama_paket' => 'required',
        'deskripsi' => 'required',
        'harga' => 'required|numeric',
        'kuota' => 'required|numeric',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    ]);

    $foto = $paket->foto;

    if ($request->hasFile('foto')) {

        if ($paket->foto) {

            Storage::disk('public')->delete($paket->foto);

        }

        $foto = $request
            ->file('foto')
            ->store('pakets', 'public');
    }

    $paket->update([
        'nama_paket' => $request->nama_paket,
        'deskripsi' => $request->deskripsi,
        'harga' => $request->harga,
        'kuota' => $request->kuota,
        'foto' => $foto,
    ]);

    return redirect()
        ->route('dashboard.mitra')
        ->with('success', 'Paket berhasil diperbarui!');
}

public function destroy(Paket $paket)
{
    if ($paket->mitra_id != Auth::id()) {
        abort(403);
    }

    if ($paket->foto) {

        Storage::disk('public')
            ->delete($paket->foto);

    }

    $paket->delete();

    return redirect()
        ->route('dashboard.mitra')
        ->with('success', 'Paket berhasil dihapus!');
}
}