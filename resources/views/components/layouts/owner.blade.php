<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Owner Panel</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://kit.fontawesome.com/ea9a4d1c2f.js" crossorigin="anonymous"></script>
</head>

<body class="bg-slate-100 font-[Poppins]">

<div class="flex min-h-screen">

    {{-- SIDEBAR --}}
    <aside class="w-72 bg-gradient-to-b from-purple-900 to-indigo-950 text-white fixed h-screen flex flex-col justify-between">

        <div>

            {{-- LOGO --}}
            <div class="p-8 border-b border-white/10">

                <h1 class="text-5xl font-bold text-yellow-400">
                    ThaiOwner
                </h1>

                <p class="text-slate-300 mt-2">
                    Business Monitoring
                </p>

            </div>

            {{-- MENU --}}
            <nav class="p-5 space-y-2">

                <a href="{{ route('dashboard.owner') }}"
                   class="flex items-center gap-4 px-5 py-4 rounded-2xl bg-white/10 hover:bg-white/20 transition">

                    <i class="fa-solid fa-chart-pie"></i>
                    Dashboard

                </a>

                <a href="#"
                   class="flex items-center gap-4 px-5 py-4 rounded-2xl hover:bg-white/10 transition">

                    <i class="fa-solid fa-money-bill-trend-up"></i>
                    Pendapatan

                </a>

                <a href="#"
                   class="flex items-center gap-4 px-5 py-4 rounded-2xl hover:bg-white/10 transition">

                    <i class="fa-solid fa-users"></i>
                    Data Customer

                </a>

                <a href="#"
                   class="flex items-center gap-4 px-5 py-4 rounded-2xl hover:bg-white/10 transition">

                    <i class="fa-solid fa-building"></i>
                    Data Mitra

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
    <main class="ml-72 flex-1">

        {{-- TOPBAR --}}
        <div class="bg-white px-10 py-6 shadow-sm flex items-center justify-between">

            <div>

                <h2 class="text-4xl font-bold text-slate-800">
                    Owner Dashboard 👑
                </h2>

                <p class="text-slate-500 mt-2">
                    Monitor seluruh bisnis ThaiTravel
                </p>

            </div>

            <div class="flex items-center gap-4">

                <div class="text-right">

                    <h3 class="font-semibold text-slate-800">
                        {{ Auth::user()->nama }}
                    </h3>

                    <p class="text-sm text-slate-500">
                        Owner
                    </p>

                </div>

                <div class="w-12 h-12 rounded-full bg-yellow-400 flex items-center justify-center text-white font-bold">
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