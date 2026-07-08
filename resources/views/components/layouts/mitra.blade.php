<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mitra Panel</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/ea9a4d1c2f.js" crossorigin="anonymous"></script>

    <style>
        body{
            font-family:'Poppins',sans-serif;
            background:#f4f7fb;
        }
    </style>
</head>
<body>

<div class="flex min-h-screen">

    {{-- SIDEBAR --}}
    <aside class="w-[280px] bg-gradient-to-b from-cyan-900 to-blue-950 text-white flex flex-col justify-between fixed top-0 left-0 h-screen">

        <div>

            {{-- LOGO --}}
            <div class="px-8 py-8 border-b border-white/10">

                <h1 class="text-5xl font-bold text-cyan-300">
                    ThaiMitra
                </h1>

                <p class="text-gray-300 mt-2 text-sm">
                    Mitra Travel Panel
                </p>

            </div>

            {{-- MENU --}}
            <nav class="mt-8 px-5 space-y-3">

                <a href="{{ route('dashboard.mitra') }}"
                   class="flex items-center gap-4 px-5 py-4 rounded-2xl hover:bg-white/10 transition">

                    <i class="fa-solid fa-chart-line"></i>
                    <span>Dashboard</span>

                </a>

                <a href="{{ route('mitra.paket.index') }}"
                   class="flex items-center gap-4 px-5 py-4 rounded-2xl hover:bg-white/10 transition">

                    <i class="fa-solid fa-suitcase"></i>
                    <span>Paket Saya</span>

                </a>

                <a href="{{ route('mitra.paket.create') }}"
                   class="flex items-center gap-4 px-5 py-4 rounded-2xl hover:bg-white/10 transition">

                    <i class="fa-solid fa-plus-circle"></i>
                    <span>Tambah Paket</span>

                </a>

                <a href="{{ route('mitra.bookings') }}"
                   class="flex items-center gap-4 px-5 py-4 rounded-2xl hover:bg-white/10 transition">

                    <i class="fa-solid fa-calendar-check"></i>
                    <span>Booking Masuk</span>

                </a>

                <a href="{{ route('mitra.pendapatan') }}"
                   class="flex items-center gap-4 px-5 py-4 rounded-2xl hover:bg-white/10 transition">

                    <i class="fa-solid fa-money-bill-wave"></i>
                    <span>Pendapatan</span>

                </a>

            </nav>

        </div>

        {{-- LOGOUT --}}
        <div class="p-5 border-t border-white/10">

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button
                    class="w-full bg-red-500 hover:bg-red-600 py-3 rounded-2xl font-semibold transition">

                    Logout

                </button>

            </form>

        </div>

    </aside>

    {{-- MAIN --}}
    <main class="ml-[280px] flex-1 min-h-screen">

        {{-- TOPBAR --}}
        <div class="bg-white px-10 py-6 shadow-sm flex items-center justify-between">

            <div>

                <h2 class="text-3xl font-bold text-gray-800">
                    Dashboard Mitra 
                </h2>

                <p class="text-gray-500 mt-1">
                    Kelola paket dan booking perjalanan
                </p>

            </div>

            <div class="flex items-center gap-4">

                <div class="text-right">

                    <h3 class="font-semibold text-gray-800">
                        {{ Auth::user()->nama }}
                    </h3>

                    <p class="text-sm text-gray-500 capitalize">
                        {{ Auth::user()->role }}
                    </p>

                </div>

                <div class="w-12 h-12 rounded-full bg-cyan-400 flex items-center justify-center text-white font-bold text-lg">
                    {{ strtoupper(substr(Auth::user()->nama,0,1)) }}
                </div>

            </div>

        </div>

        {{-- CONTENT --}}
        <div class="p-10">

            @if(session('success'))
                <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-2xl">
                    {{ session('success') }}
                </div>
            @endif

            {{ $slot }}

        </div>

    </main>

</div>

</body>
</html>