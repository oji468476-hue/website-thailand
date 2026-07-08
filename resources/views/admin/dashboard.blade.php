<x-layouts.admin>

<div class="space-y-8">

    {{-- HEADER --}}
    <div>
        <h1 class="text-4xl font-bold text-slate-800">
            👋 Selamat datang, Admin!
        </h1>

        <p class="text-slate-500 mt-2">
            Pantau performa bisnis travel hari ini.
        </p>
    </div>


    {{-- CARD STATISTIK --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">

        {{-- USER --}}
        <div class="bg-white rounded-3xl p-7 shadow-sm border border-slate-100">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-slate-500">
                        Total User
                    </p>

                    <h2 class="text-5xl font-bold mt-3 text-slate-800">
                        {{ $totalUsers }}
                    </h2>
                </div>

                <div class="w-16 h-16 rounded-2xl bg-purple-100 flex items-center justify-center text-purple-600 text-2xl">
                    <i class="fa-solid fa-users"></i>
                </div>

            </div>

        </div>


        {{-- PAKET --}}
        <div class="bg-white rounded-3xl p-7 shadow-sm border border-slate-100">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-slate-500">
                        Paket Wisata
                    </p>

                    <h2 class="text-5xl font-bold mt-3 text-slate-800">
                        {{ $totalPaket }}
                    </h2>
                </div>

                <div class="w-16 h-16 rounded-2xl bg-cyan-100 flex items-center justify-center text-cyan-600 text-2xl">
                    <i class="fa-solid fa-box"></i>
                </div>

            </div>

        </div>


        {{-- BOOKING --}}
        <div class="bg-white rounded-3xl p-7 shadow-sm border border-slate-100">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-slate-500">
                        Booking Pending
                    </p>

                    <h2 class="text-5xl font-bold mt-3 text-slate-800">
                        {{ $bookingPending }}
                    </h2>
                </div>

                <div class="w-16 h-16 rounded-2xl bg-orange-100 flex items-center justify-center text-orange-500 text-2xl">
                    <i class="fa-solid fa-clock"></i>
                </div>

            </div>

        </div>


        {{-- TRANSAKSI --}}
        <div class="bg-white rounded-3xl p-7 shadow-sm border border-slate-100">

            <div class="flex items-center justify-between">

                <div>
                    <p class="text-slate-500">
                        Total Transaksi
                    </p>

                    <h2 class="text-3xl font-bold mt-3 text-green-600">
                        Rp {{ number_format($transaksi,0,',','.') }}
                    </h2>
                </div>

                <div class="w-16 h-16 rounded-2xl bg-green-100 flex items-center justify-center text-green-600 text-2xl">
                    <i class="fa-solid fa-money-bill-wave"></i>
                </div>

            </div>

        </div>

    </div>



    {{-- QUICK ACTION --}}
    <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100">

        <h2 class="text-2xl font-bold text-slate-800 mb-6">
            ⚡ Aksi Cepat
        </h2>

        <div class="flex flex-wrap gap-4">

            <a href="{{ route('admin.verifikasi') }}"
               class="bg-yellow-500 hover:bg-yellow-600 transition text-white px-7 py-4 rounded-2xl font-semibold">

                <i class="fa-solid fa-check mr-2"></i>
                Verifikasi Pembayaran

            </a>

            <a href="{{ route('admin.users.index') }}"
               class="bg-purple-600 hover:bg-purple-700 transition text-white px-7 py-4 rounded-2xl font-semibold">

                <i class="fa-solid fa-users mr-2"></i>
                Kelola User

            </a>

            <a href="{{ route('admin.pakets.index') }}"
               class="bg-cyan-600 hover:bg-cyan-700 transition text-white px-7 py-4 rounded-2xl font-semibold">

                <i class="fa-solid fa-box mr-2"></i>
                Kelola Paket

            </a>

        </div>

    </div>



    {{-- RECENT BOOKING --}}
    <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100">

        <div class="flex items-center justify-between mb-6">

            <h2 class="text-2xl font-bold text-slate-800">
                📋 Booking Terbaru
            </h2>

            <span class="text-sm text-slate-400">
                Last Update
            </span>

        </div>

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead>

                    <tr class="border-b border-slate-100 text-left">

                        <th class="pb-4 text-slate-500 font-medium">
                            Customer
                        </th>

                        <th class="pb-4 text-slate-500 font-medium">
                            Paket
                        </th>

                        <th class="pb-4 text-slate-500 font-medium">
                            Total
                        </th>

                        <th class="pb-4 text-slate-500 font-medium">
                            Status
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @foreach(\App\Models\Booking::latest()->take(5)->get() as $booking)

                    <tr class="border-b border-slate-50">

                        <td class="py-5 font-medium text-slate-700">
                            {{ $booking->user->nama ?? '-' }}
                        </td>

                        <td class="py-5 text-slate-600">
                            {{ $booking->paket->nama_paket ?? '-' }}
                        </td>

                        <td class="py-5 text-slate-600">
                            Rp {{ number_format($booking->total_price,0,',','.') }}
                        </td>

                        <td class="py-5">

                            @if($booking->status == 'pending')

                                <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-xl text-sm font-semibold">
                                    Pending
                                </span>

                            @elseif($booking->status == 'confirmed')

                                <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-xl text-sm font-semibold">
                                    Confirmed
                                </span>

                            @else

                                <span class="bg-green-100 text-green-700 px-4 py-2 rounded-xl text-sm font-semibold">
                                    Completed
                                </span>

                            @endif

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

</x-layouts.admin>