
<x-layouts.customer>

<div class="max-w-7xl mx-auto">

    {{-- HERO --}}
    <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100 mb-8">

        <div class="flex items-center justify-between">

            <div>

                <h1 class="text-4xl font-bold text-slate-900">
                    Selamat Datang,
                    <span class="text-yellow-500">
                        {{ Auth::user()->nama }}
                    </span>
                </h1>

                <p class="text-slate-500 mt-3">
                    Kelola booking, pembayaran dan perjalanan Anda.
                </p>

            </div>

            <a href="/#paket"
               class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-2xl font-semibold transition">

                Jelajahi Paket

            </a>

        </div>

    </div>


    {{-- STATISTIK --}}
    <div class="grid md:grid-cols-4 gap-5 mb-8">

        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100">

            <p class="text-slate-500">
                Total Booking
            </p>

            <h2 class="text-3xl font-bold text-slate-900 mt-2">
                {{ $bookings->count() }}
            </h2>

        </div>

        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100">

            <p class="text-slate-500">
                Pending
            </p>

            <h2 class="text-3xl font-bold text-yellow-500 mt-2">

                {{
                    $bookings->where('status','pending')->count()
                }}

            </h2>

        </div>

        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100">

            <p class="text-slate-500">
                Confirmed
            </p>

            <h2 class="text-3xl font-bold text-green-600 mt-2">

                {{
                    $bookings->where('status','confirmed')->count()
                }}

            </h2>

        </div>

        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100">

            <p class="text-slate-500">
                Pembayaran
            </p>

            <h2 class="text-3xl font-bold text-blue-600 mt-2">

                {{
                    $bookings->filter(
                        fn($b)=>$b->pembayaran
                    )->count()
                }}

            </h2>

        </div>

    </div>


    {{-- BOOKING TERBARU --}}
    <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100 mb-8">

        <h2 class="text-2xl font-bold mb-6">
            Booking Terbaru
        </h2>

        @forelse($bookings->take(5) as $booking)

            <div class="flex items-center justify-between py-4 border-b">

                <div>

                    <h4 class="font-semibold text-slate-900">

                        {{ $booking->paket->nama_paket }}

                    </h4>

                    <p class="text-slate-500 text-sm">

                        {{ $booking->created_at->format('d M Y') }}

                    </p>

                </div>

                <span
                    class="px-4 py-2 rounded-full text-sm font-semibold

                    @if($booking->status == 'confirmed')
                        bg-green-100 text-green-600
                    @elseif($booking->status == 'pending')
                        bg-yellow-100 text-yellow-600
                    @else
                        bg-red-100 text-red-600
                    @endif">

                    {{ ucfirst($booking->status) }}

                </span>

            </div>

        @empty

            <p class="text-slate-500">
                Belum ada booking.
            </p>

        @endforelse

    </div>


    {{-- AKSI CEPAT --}}
    <div class="grid md:grid-cols-3 gap-5 mb-8">

        <a href="/#paket"
           class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 hover:shadow-lg transition">

            <div class="text-4xl mb-3">
                🌴
            </div>

            <h3 class="font-bold text-xl">
                Jelajahi Paket
            </h3>

            <p class="text-slate-500 mt-2">
                Temukan destinasi wisata terbaik.
            </p>

        </a>

        <a href="{{ route('customer.booking.history') }}"
           class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 hover:shadow-lg transition">

            <div class="text-4xl mb-3">
                📋
            </div>

            <h3 class="font-bold text-xl">
                Booking Saya
            </h3>

            <p class="text-slate-500 mt-2">
                Lihat seluruh riwayat booking.
            </p>

        </a>

        <a href="{{ route('customer.pembayaran.index') }}"
           class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 hover:shadow-lg transition">

            <div class="text-4xl mb-3">
                💳
            </div>

            <h3 class="font-bold text-xl">
                Pembayaran
            </h3>

            <p class="text-slate-500 mt-2">
                Upload bukti pembayaran.
            </p>

        </a>

    </div>


    {{-- PAKET REKOMENDASI --}}
    <div class="bg-white rounded-3xl p-8 shadow-sm border border-slate-100">

        <h2 class="text-2xl font-bold mb-8">
            Paket Rekomendasi
        </h2>

        <div class="grid md:grid-cols-3 gap-6">

            @foreach($pakets->take(3) as $paket)

            <div class="border rounded-3xl overflow-hidden hover:shadow-xl transition">

                <img
                    src="{{ $paket->foto
                        ? asset('storage/'.$paket->foto)
                        : asset('storage/pakets/default.jpg') }}"
                    class="w-full h-52 object-cover">

                <div class="p-5">

                    <h3 class="font-bold text-xl text-slate-900">

                        {{ $paket->nama_paket }}

                    </h3>

                    <p class="text-slate-500 mt-2 line-clamp-2">

                        {{ $paket->deskripsi }}

                    </p>

                    <div class="mt-4">

                        <span class="text-green-600 text-2xl font-bold">

                            Rp {{ number_format($paket->harga,0,',','.') }}

                        </span>

                    </div>

                    <a href="{{ route('customer.booking.create',$paket->id) }}"
                       class="mt-5 block text-center bg-slate-900 hover:bg-slate-800 text-white py-3 rounded-2xl font-semibold transition">

                        Pesan Sekarang

                    </a>

                </div>

            </div>

            @endforeach

        </div>

    </div>

</div>

</x-layouts.customer>
