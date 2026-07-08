<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ThaiTravel Customer</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/ea9a4d1c2f.js" crossorigin="anonymous"></script>

    <style>
        body{
            font-family:'Poppins',sans-serif;
        }
    </style>
</head>

<body class="bg-slate-100">

<div class="flex min-h-screen">

    {{-- SIDEBAR --}}
    <aside class="w-[260px] bg-slate-900 text-white fixed left-0 top-0 h-screen flex flex-col justify-between">

        <div>

            {{-- LOGO --}}
            <div class="p-8 border-b border-white/10">

                <h1 class="text-4xl font-bold">
                    <span class="text-white">Thai</span><span class="text-yellow-500">Travel</span>
                </h1>

                <p class="text-slate-400 mt-2">
                    Customer Dashboard
                </p>

            </div>

            {{-- MENU --}}
            <nav class="p-5 space-y-2">

                <a href="{{ route('dashboard.customer') }}"
                   class="flex items-center gap-4 px-5 py-4 rounded-xl hover:bg-white/10 transition">

                    <i class="fa-solid fa-house"></i>
                    Dashboard

                </a>

                <a href="{{ route('customer.booking.history') }}"
                   class="flex items-center gap-4 px-5 py-4 rounded-xl hover:bg-white/10 transition">

                    <i class="fa-solid fa-suitcase"></i>
                    Booking Saya

                </a>

                <a href="{{ route('customer.pembayaran.index') }}"
                   class="flex items-center gap-4 px-5 py-4 rounded-xl hover:bg-white/10 transition">

                    <i class="fa-solid fa-credit-card"></i>
                    Pembayaran

                </a>

                <a href="{{ route('customer.profil') }}"
                   class="flex items-center gap-4 px-5 py-4 rounded-xl hover:bg-white/10 transition">

                    <i class="fa-solid fa-user"></i>
                    Profil

                </a>

            </nav>

        </div>

        {{-- LOGOUT --}}
        <div class="p-5 border-t border-white/10">

            <form action="{{ route('logout') }}" method="POST">
                @csrf

                <button
                    class="w-full bg-red-500 hover:bg-red-600 py-3 rounded-xl font-semibold transition">

                    Logout

                </button>

            </form>

        </div>

    </aside>


    {{-- MAIN --}}
    <main class="ml-[260px] flex-1">

        {{-- TOPBAR --}}
        <div class="bg-white shadow-sm px-10 py-6 flex justify-between items-center">

            <div>

                <h2 class="text-3xl font-bold text-slate-800">
                    Selamat Datang 👋
                </h2>

                <p class="text-slate-500">
                    Nikmati perjalanan terbaik bersama ThaiTravel
                </p>

            </div>

            <div class="flex items-center gap-4">

                <div class="text-right">

                    <h3 class="font-semibold text-slate-800">
                        {{ Auth::user()->nama }}
                    </h3>

                    <p class="text-sm text-slate-500">
                        Customer
                    </p>

                </div>

                <div class="w-12 h-12 rounded-full bg-yellow-500 text-white flex items-center justify-center font-bold">
                    {{ strtoupper(substr(Auth::user()->nama,0,1)) }}
                </div>

            </div>

        </div>

        {{-- CONTENT --}}
        <div class="p-10">

            {{ $slot }}

        </div>

    </main>

</div>

</body>
</html>