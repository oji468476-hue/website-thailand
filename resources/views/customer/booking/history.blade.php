<x-layouts.customer>

<div class="max-w-7xl mx-auto">

    {{-- HEADER --}}
    <div class="mb-10">

        <h1 class="text-4xl font-bold text-slate-900">
            📋 Booking Saya
        </h1>

        <p class="text-slate-500 mt-2">
            Pantau seluruh perjalanan dan status booking Anda.
        </p>

    </div>

    {{-- SUMMARY --}}
    <div class="grid md:grid-cols-4 gap-5 mb-10">

        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100">

            <p class="text-slate-500">
                Total Booking
            </p>

            <h2 class="text-4xl font-bold text-blue-600 mt-2">
                {{ $bookings->count() }}
            </h2>

        </div>

        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100">

            <p class="text-slate-500">
                Pending
            </p>

            <h2 class="text-4xl font-bold text-yellow-500 mt-2">
                {{ $bookings->where('status','pending')->count() }}
            </h2>

        </div>

        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100">

            <p class="text-slate-500">
                Confirmed
            </p>

            <h2 class="text-4xl font-bold text-blue-500 mt-2">
                {{ $bookings->where('status','confirmed')->count() }}
            </h2>

        </div>

        <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100">

            <p class="text-slate-500">
                Selesai
            </p>

            <h2 class="text-4xl font-bold text-green-600 mt-2">
                {{ $bookings->where('status','completed')->count() }}
            </h2>

        </div>

    </div>

    {{-- LIST BOOKING --}}
    <div class="space-y-6">

        @forelse($bookings as $booking)

        <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">

            {{-- HEADER CARD --}}
            <div class="bg-slate-900 text-white p-6">

                <div class="flex flex-col md:flex-row justify-between gap-4">

                    <div>

                        <h2 class="text-2xl font-bold">
                            {{ $booking->paket->nama_paket }}
                        </h2>

                        <p class="text-slate-300 mt-2">
                            Booking #{{ $booking->id }}
                        </p>

                    </div>

                    <div>

                        @if($booking->status == 'pending')

                            <span class="bg-yellow-500 px-4 py-2 rounded-xl font-semibold">
                                Pending
                            </span>

                        @elseif($booking->status == 'confirmed')

                            <span class="bg-blue-500 px-4 py-2 rounded-xl font-semibold">
                                Confirmed
                            </span>

                        @elseif($booking->status == 'completed')

                            <span class="bg-green-500 px-4 py-2 rounded-xl font-semibold">
                                Completed
                            </span>

                        @else

                            <span class="bg-red-500 px-4 py-2 rounded-xl font-semibold">
                                Rejected
                            </span>

                        @endif

                    </div>

                </div>

            </div>

            {{-- CONTENT --}}
            <div class="p-8">

                <div class="grid md:grid-cols-3 gap-6 mb-8">

                    <div>

                        <p class="text-slate-500 text-sm">
                            Tanggal Keberangkatan
                        </p>

                        <h3 class="font-bold text-lg mt-1">
                            {{ optional($booking->departure_date)->format('d F Y') }}
                        </h3>

                    </div>

                    <div>

                        <p class="text-slate-500 text-sm">
                            Jumlah Peserta
                        </p>

                        <h3 class="font-bold text-lg mt-1">
                            {{ $booking->participants }} Orang
                        </h3>

                    </div>

                    <div>

                        <p class="text-slate-500 text-sm">
                            Total Pembayaran
                        </p>

                        <h3 class="font-bold text-lg text-green-600 mt-1">
                            Rp {{ number_format($booking->total_price,0,',','.') }}
                        </h3>

                    </div>

                </div>

                {{-- STATUS TIMELINE --}}
                <div class="mb-8">

                    <h3 class="font-bold text-slate-800 mb-4">
                        Status Perjalanan
                    </h3>

                    <div class="flex items-center justify-between">

                        <div class="text-center flex-1">

                            <div class="w-10 h-10 rounded-full bg-green-500 text-white flex items-center justify-center mx-auto">
                                ✓
                            </div>

                            <p class="text-sm mt-2">
                                Booking
                            </p>

                        </div>

                        <div class="h-1 bg-green-500 flex-1"></div>

                        <div class="text-center flex-1">

                            <div class="w-10 h-10 rounded-full {{ $booking->pembayaran ? 'bg-green-500 text-white' : 'bg-slate-200' }} flex items-center justify-center mx-auto">
                                ✓
                            </div>

                            <p class="text-sm mt-2">
                                Pembayaran
                            </p>

                        </div>

                        <div class="h-1 {{ $booking->status == 'confirmed' || $booking->status == 'completed' ? 'bg-green-500' : 'bg-slate-200' }} flex-1"></div>

                        <div class="text-center flex-1">

                            <div class="w-10 h-10 rounded-full {{ $booking->status == 'confirmed' || $booking->status == 'completed' ? 'bg-green-500 text-white' : 'bg-slate-200' }} flex items-center justify-center mx-auto">
                                ✓
                            </div>

                            <p class="text-sm mt-2">
                                Verifikasi
                            </p>

                        </div>

                        <div class="h-1 {{ $booking->status == 'completed' ? 'bg-green-500' : 'bg-slate-200' }} flex-1"></div>

                        <div class="text-center flex-1">

                            <div class="w-10 h-10 rounded-full {{ $booking->status == 'completed' ? 'bg-green-500 text-white' : 'bg-slate-200' }} flex items-center justify-center mx-auto">
                                ✓
                            </div>

                            <p class="text-sm mt-2">
                                Selesai
                            </p>

                        </div>

                    </div>

                </div>

                {{-- STATUS PEMBAYARAN --}}
                <div class="flex flex-wrap gap-3">

                    @if(!$booking->pembayaran)

                        <span class="bg-gray-100 text-gray-700 px-4 py-2 rounded-xl">
                            Belum Dibayar
                        </span>

                        <a
                            href="{{ route('customer.pembayaran.create',$booking->id) }}"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-5 py-2 rounded-xl font-semibold">

                            Bayar Sekarang

                        </a>

                    @elseif($booking->pembayaran->status == 'pending')

                        <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-xl">
                            Menunggu Verifikasi Pembayaran
                        </span>

                    @elseif($booking->pembayaran->status == 'verified')

                        <span class="bg-green-100 text-green-700 px-4 py-2 rounded-xl">
                            Pembayaran Diverifikasi
                        </span>

                    @elseif($booking->pembayaran->status == 'rejected')

                        <span class="bg-red-100 text-red-700 px-4 py-2 rounded-xl">
                            Pembayaran Ditolak
                        </span>

                        <a
                            href="{{ route('customer.pembayaran.create',$booking->id) }}"
                            class="bg-red-500 hover:bg-red-600 text-white px-5 py-2 rounded-xl font-semibold">

                            Upload Ulang

                        </a>

                    @endif

                </div>

            </div>

        </div>

        @empty

        <div class="bg-white rounded-3xl p-16 text-center shadow-sm">

            <div class="text-7xl mb-4">
                ✈️
            </div>

            <h2 class="text-3xl font-bold text-slate-800">
                Belum Ada Booking
            </h2>

            <p class="text-slate-500 mt-3">
                Yuk mulai perjalanan pertamamu bersama ThaiTravel.
            </p>

            <a
                href="/#paket"
                class="inline-block mt-6 bg-yellow-500 hover:bg-yellow-600 text-white px-8 py-3 rounded-2xl font-semibold">

                Jelajahi Paket

            </a>

        </div>

        @endforelse

    </div>

</div>

</x-layouts.customer>