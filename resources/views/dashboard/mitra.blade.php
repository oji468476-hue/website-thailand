<x-layouts.mitra>

{{-- HERO --}}

<div class="bg-gradient-to-r from-cyan-600 via-blue-700 to-blue-900 rounded-3xl p-8 text-white mb-8">

<div class="flex justify-between items-center">

    <div>
        <h1 class="text-4xl font-bold">
            Selamat Datang, {{ auth()->user()->nama }} 
        </h1>

        <p class="text-cyan-100 mt-2">
            Kelola paket wisata, booking customer dan pantau pendapatan bisnis Anda.
        </p>
    </div>
<div class="flex gap-10 mt-6">

    <div>
        <h3 class="text-3xl font-bold">
            {{ $totalPaket }}
        </h3>
        <p class="text-cyan-100">
            Paket Aktif
        </p>
    </div>

    <div>
        <h3 class="text-3xl font-bold">
            {{ $bookingMasuk }}
        </h3>
        <p class="text-cyan-100">
            Booking
        </p>
    </div>

    <div>
        <h3 class="text-3xl font-bold">
            Rp {{ number_format($pendapatan,0,',','.') }}
        </h3>
        <p class="text-cyan-100">
            Pendapatan
        </p>
    </div>

</div>
    <a href="{{ route('mitra.paket.create') }}"
       class="bg-white text-blue-400 px-2 py-1 rounded-2xl font-bold hover:scale-90 transition">

        + Tambah Paket

    </a>

</div>


</div>

{{-- STATISTIK --}}

<div class="grid md:grid-cols-3 gap-6 mb-8">

    {{-- Paket --}}
    <div class="bg-gradient-to-r from-cyan-500 to-blue-600 rounded-3xl p-8 text-white shadow-lg hover:scale-105 transition">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-cyan-100">
                    Paket Aktif
                </p>

                <h2 class="text-5xl font-bold mt-2">
                    {{ $totalPaket }}
                </h2>

                <p class="mt-3 text-sm text-cyan-100">
                    Paket wisata milik Anda
                </p>

            </div>

            <div class="text-6xl opacity-80">
                📦
            </div>

        </div>

    </div>

    {{-- Booking --}}
    <div class="bg-gradient-to-r from-green-500 to-emerald-600 rounded-3xl p-8 text-white shadow-lg hover:scale-105 transition">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-green-100">
                    Booking Masuk
                </p>

                <h2 class="text-5xl font-bold mt-2">
                    {{ $bookingMasuk }}
                </h2>

                <p class="mt-3 text-sm text-green-100">
                    Total booking customer
                </p>

            </div>

            <div class="text-6xl opacity-80">
                📋
            </div>

        </div>

    </div>

    {{-- Pendapatan --}}
    <div class="bg-gradient-to-r from-yellow-400 to-orange-500 rounded-3xl p-8 text-white shadow-lg hover:scale-105 transition">

        <div class="flex justify-between items-center">

            <div>

                <p class="text-yellow-100">
                    Pendapatan
                </p>

                <h2 class="text-3xl font-bold mt-2">
                    Rp {{ number_format($pendapatan,0,',','.') }}
                </h2>

                <p class="mt-3 text-sm text-yellow-100">
                    Total pendapatan mitra
                </p>

            </div>

            <div class="text-6xl opacity-80">
                💰
            </div>

        </div>

    </div>

</div>


</div>

{{-- BOOKING TERBARU + PAKET TERLARIS --}}

<div class="grid lg:grid-cols-2 gap-6 mb-8">

<div class="bg-white rounded-3xl p-8 shadow-sm">

    <h2 class="text-2xl font-bold mb-6">
         Booking Terbaru
    </h2>

    @forelse($bookingTerbaru as $booking)

        <div class="flex justify-between border-b py-4">

            <div>

                <h4 class="font-semibold">
                    {{ $booking->user->nama }}
                </h4>

                <p class="text-sm text-gray-500">
                    {{ $booking->paket->nama_paket }}
                </p>

            </div>

@if($booking->status == 'confirmed')

    <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-semibold">
        Confirmed
    </span>

@elseif($booking->status == 'pending')

    <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm font-semibold">
        Pending
    </span>

@else

    <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full text-sm font-semibold">
        Cancelled
    </span>

@endif

        </div>

    @empty

        <p class="text-gray-500">
            Belum ada booking.
        </p>

    @endforelse

</div>


<div class="bg-white rounded-3xl p-8 shadow-sm">

    <h2 class="text-2xl font-bold mb-6">
         Paket Terlaris
    </h2>

    @forelse($paketTerlaris as $paket)

        <div class="flex justify-between border-b py-4">

            <span>
                {{ $paket->nama_paket }}
            </span>

            <span class="font-bold text-cyan-600">
                {{ $paket->bookings_count }} Booking
            </span>

        </div>

    @empty

        <p class="text-gray-500">
            Belum ada data.
        </p>

    @endforelse

</div>

</div>

{{-- PAKET SAYA --}}

<div class="bg-white rounded-3xl p-8 shadow-sm">

<div class="flex justify-between items-center mb-8">

    <h2 class="text-3xl font-bold">
        Paket Saya
    </h2>

    <a href="{{ route('mitra.paket.index') }}"
       class="bg-cyan-500 text-white px-5 py-3 rounded-2xl">

        Kelola Paket

    </a>

</div>

<div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">

    @foreach($pakets as $paket)

    <div class="border rounded-3xl overflow-hidden">

<img
    src="{{ $paket->foto
        ? asset('storage/'.$paket->foto)
        : asset('storage/pakets/default.jpg') }}"
    class="w-full h-52 object-cover"
    alt="{{ $paket->nama_paket }}">

        <div class="p-5">

            <h3 class="font-bold text-xl">
                {{ $paket->nama_paket }}
            </h3>

            <p class="text-sm text-gray-500 mt-2">
                Kuota {{ $paket->kuota }}
            </p>

            <p class="text-cyan-600 font-bold mt-3">
                Rp {{ number_format($paket->harga,0,',','.') }}
            </p>

            <div class="flex gap-2 mt-5">

                <a href="{{ route('mitra.paket.edit',$paket->id) }}"
                   class="flex-1 bg-yellow-400 text-white text-center py-2 rounded-xl">

                    Edit

                </a>

                <form
                    action="{{ route('mitra.paket.destroy',$paket->id) }}"
                    method="POST"
                    class="flex-1">

                    @csrf
                    @method('DELETE')

                    <button
                        onclick="return confirm('Yakin hapus paket ini?')"
                        class="w-full bg-red-500 text-white py-2 rounded-xl">

                        Hapus

                    </button>

                </form>

            </div>

        </div>

    </div>

    @endforeach

</div>

</div>

</x-layouts.mitra>
