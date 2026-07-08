<x-layouts.mitra>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <div class="bg-white p-8 rounded-3xl shadow-sm">

        <p class="text-slate-500">
            Total Paket
        </p>

        <h2 class="text-5xl font-bold mt-3">
            {{ $paket->count() }}
        </h2>

    </div>

    <div class="bg-white p-8 rounded-3xl shadow-sm">

        <p class="text-slate-500">
            Booking Masuk
        </p>

        <h2 class="text-5xl font-bold mt-3">
            {{ $booking->count() }}
        </h2>

    </div>

    <div class="bg-white p-8 rounded-3xl shadow-sm">

        <p class="text-slate-500">
            Pendapatan
        </p>

        <h2 class="text-3xl font-bold mt-3 text-emerald-600">
            Rp {{ number_format($pendapatan,0,',','.') }}
        </h2>

    </div>

</div>

</x-layouts.mitra>