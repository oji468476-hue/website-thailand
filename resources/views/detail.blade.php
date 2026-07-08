<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $paket->nama_paket }} | ThaiTravel</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
</head>

<body class="bg-slate-100 font-[Poppins]">

<div class="max-w-7xl mx-auto py-10 px-6">

    <div class="grid lg:grid-cols-3 gap-8">

        {{-- KIRI --}}
        <div class="lg:col-span-2">

            <div class="bg-white rounded-3xl overflow-hidden shadow-sm">

                <img
                    src="{{ $paket->foto
    ? asset('storage/' . $paket->foto)
    : asset('storage/pakets/default.jpg') }}"
                    class="w-full h-[450px] object-cover">

                <div class="p-8">

                    <div class="flex items-center gap-3 mb-4">

                        <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-semibold">
                            Paket Wisata Thailand
                        </span>

                        <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm font-semibold">
                            Tersedia
                        </span>

                    </div>

                    <h1 class="text-5xl font-bold text-slate-900 mb-4">
                        {{ $paket->nama_paket }}
                    </h1>

                    <p class="text-slate-600 text-lg leading-relaxed">
                        {{ $paket->deskripsi }}
                    </p>

                </div>

            </div>

            {{-- FASILITAS --}}
            <div class="bg-white rounded-3xl shadow-sm p-8 mt-8">

                <h2 class="text-2xl font-bold text-slate-900 mb-6">
                    Fasilitas Paket
                </h2>

                <div class="grid md:grid-cols-2 gap-4">

                    <div class="bg-slate-50 p-4 rounded-2xl">
                        ✓ Hotel Penginapan
                    </div>

                    <div class="bg-slate-50 p-4 rounded-2xl">
                        ✓ Transportasi Lokal
                    </div>

                    <div class="bg-slate-50 p-4 rounded-2xl">
                        ✓ Tour Guide
                    </div>

                    <div class="bg-slate-50 p-4 rounded-2xl">
                        ✓ Tiket Wisata
                    </div>

                    <div class="bg-slate-50 p-4 rounded-2xl">
                        ✓ Dokumentasi
                    </div>

                    <div class="bg-slate-50 p-4 rounded-2xl">
                        ✓ Sarapan Hotel
                    </div>

                </div>

            </div>

        </div>

        {{-- KANAN --}}
        <div>

            <div class="bg-white rounded-3xl shadow-sm p-8 sticky top-8">

                <h3 class="text-2xl font-bold text-slate-900 mb-6">
                    Ringkasan Paket
                </h3>

                <div class="space-y-5">

                    <div class="flex justify-between">

                        <span class="text-slate-500">
                            Harga
                        </span>

                        <span class="font-bold text-yellow-600 text-xl">

                            Rp {{ number_format($paket->harga,0,',','.') }}

                        </span>

                    </div>

                    <div class="flex justify-between">

                        <span class="text-slate-500">
                            Kuota
                        </span>

                        <span class="font-semibold">

                            {{ $paket->kuota }} Orang

                        </span>

                    </div>

                    <div class="flex justify-between">

                        <span class="text-slate-500">
                            Status
                        </span>

                       @if($paket->kuota == 0)

    <span class="text-red-600 font-semibold">
        Penuh
    </span>

@elseif($paket->kuota <= 10)

    <span class="text-yellow-600 font-semibold">
        Hampir Penuh
    </span>

@else

    <span class="text-green-600 font-semibold">
        Tersedia
    </span>

@endif

                    </div>

                </div>

                <hr class="my-8">

                @auth

                    @if(Auth::user()->role == 'customer')
@if($paket->kuota > 0)

    <a
        href="{{ route('customer.booking.create', $paket->id) }}"
        class="block w-full text-center bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-4 rounded-2xl transition">

        Pesan Sekarang

    </a>

@else

    <button
        disabled
        class="w-full bg-red-500 text-white font-bold py-4 rounded-2xl cursor-not-allowed">

        Paket Penuh

    </button>

@endif

                    @else

                        <div class="bg-red-50 text-red-600 p-4 rounded-2xl text-center">

                            Hanya customer yang dapat melakukan booking.

                        </div>

                    @endif

                @else

                    <a
                        href="{{ route('login') }}"
                        class="block w-full text-center bg-[#071739] hover:bg-[#0d285f] text-white font-bold py-4 rounded-2xl transition">

                        Login Untuk Booking

                    </a>

                @endauth

            </div>

        </div>

    </div>

</div>

</body>
</html>