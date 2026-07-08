<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ThaiTravel</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

</head>

<body class="font-[Poppins]">

<div class="min-h-screen flex">

    {{-- KIRI --}}
    <div
        class="hidden lg:flex w-1/2 relative overflow-hidden">

        <img
            src="https://images.unsplash.com/photo-1508009603885-50cf7c579365?q=80&w=1600"
            class="absolute inset-0 w-full h-full object-cover">

        <div class="absolute inset-0 bg-[#071739]/80"></div>

        <div class="relative z-10 flex flex-col justify-center px-20 text-white">

            <h1 class="text-7xl font-extrabold mb-6 text-yellow-400">
                ThaiTravel
            </h1>

            <h2 class="text-4xl font-bold mb-5">
    Sistem Pemesanan Wisata Thailand
</h2>

<p class="text-xl text-gray-200 leading-relaxed max-w-xl">

    Platform digital untuk pemesanan paket wisata,
    pengelolaan pembayaran, verifikasi transaksi,
    dan monitoring perjalanan pelanggan.

</p>

<div class="mt-10 space-y-4">

    <div class="flex items-center gap-3">
        <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
        <span>Pemesanan Paket Wisata</span>
    </div>

    <div class="flex items-center gap-3">
        <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
        <span>Pembayaran Online</span>
    </div>

    <div class="flex items-center gap-3">
        <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
        <span>Verifikasi Transaksi</span>
    </div>

    <div class="flex items-center gap-3">
        <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
        <span>Monitoring Perjalanan</span>
    </div>

</div>

        </div>

    </div>


    {{-- KANAN --}}
    <div
        class="w-full lg:w-1/2 flex items-center justify-center bg-slate-100 p-10">

        <div
    class="bg-white w-full max-w-lg rounded-[32px] shadow-2xl p-12">

            {{ $slot }}

        </div>

    </div>

</div>

</body>
</html>