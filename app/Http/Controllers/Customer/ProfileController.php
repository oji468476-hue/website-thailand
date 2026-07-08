<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | HALAMAN PROFIL
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        return view('customer.profil');
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT PROFIL
    |--------------------------------------------------------------------------
    */

    public function edit()
    {
        return view('customer.edit-profile');
    }

    public function update(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        Auth::user()->update([
            'nama' => $request->nama,
            'email' => $request->email,
        ]);

        return redirect()
            ->route('customer.profil')
            ->with('success', 'Profil berhasil diperbarui.');
    }

    /*
    |--------------------------------------------------------------------------
    | PASSWORD
    |--------------------------------------------------------------------------
    */

    public function editPassword()
    {
        return view('customer.change-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        if (!Hash::check(
            $request->current_password,
            Auth::user()->password
        )) {
            return back()->withErrors([
                'current_password' => 'Password lama salah.'
            ]);
        }

        Auth::user()->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()
            ->route('customer.profil')
            ->with('success', 'Password berhasil diubah.');
    }
}