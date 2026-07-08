<x-layouts.customer>

<div class="max-w-7xl mx-auto">

    {{-- HEADER --}}
    <div class="mb-10">

        <h1 class="text-4xl font-bold text-slate-900">
            💳 Pembayaran Saya
        </h1>

        <p class="text-slate-500 mt-2">
            Kelola seluruh transaksi dan pembayaran booking Anda.
        </p>

    </div>

    {{-- ALERT --}}
    @if(session('success'))

    <div class="mb-8 bg-green-100 border border-green-300 text-green-700 px-6 py-4 rounded-2xl">

        {{ session('success') }}

    </div>

    @endif

    {{-- SUMMARY --}}
    <div class="grid md:grid-cols-4 gap-5 mb-10">

        <div class="bg-white rounded-3xl p-6 shadow-sm">

            <p class="text-slate-500">
                Total Transaksi
            </p>

            <h2 class="text-4xl font-bold text-blue-600 mt-2">
                {{ $bookings->count() }}
            </h2>

        </div>

        <div class="bg-white rounded-3xl p-6 shadow-sm">

            <p class="text-slate-500">
                Belum Dibayar
            </p>

            <h2 class="text-4xl font-bold text-slate-700 mt-2">
                {{
                    $bookings->filter(
                        fn($b)=>!$b->pembayaran
                    )->count()
                }}
            </h2>

        </div>

        <div class="bg-white rounded-3xl p-6 shadow-sm">

            <p class="text-slate-500">
                Pending
            </p>

            <h2 class="text-4xl font-bold text-yellow-500 mt-2">
                {{
                    $bookings->filter(
                        fn($b)=>
                        $b->pembayaran &&
                        $b->pembayaran->status == 'pending'
                    )->count()
                }}
            </h2>

        </div>

        <div class="bg-white rounded-3xl p-6 shadow-sm">

            <p class="text-slate-500">
                Verified
            </p>

            <h2 class="text-4xl font-bold text-green-600 mt-2">
                {{
                    $bookings->filter(
                        fn($b)=>
                        $b->pembayaran &&
                        $b->pembayaran->status == 'verified'
                    )->count()
                }}
            </h2>

        </div>

    </div>

    {{-- LIST PEMBAYARAN --}}
    <div class="space-y-6">

        @forelse($bookings as $booking)

        <div class="bg-white rounded-3xl shadow-sm border border-slate-100 overflow-hidden">

            {{-- HEADER --}}
            <div class="bg-slate-900 text-white p-6">

                <div class="flex justify-between items-center">

                    <div>

                        <h2 class="text-2xl font-bold">
                            Transaksi #{{ $booking->id }}
                        </h2>

                        <p class="text-slate-300 mt-2">
                            {{ $booking->paket->nama_paket }}
                        </p>

                    </div>

                    <div>

                        @if(!$booking->pembayaran)

                            <span class="bg-slate-500 px-4 py-2 rounded-xl">
                                Belum Dibayar
                            </span>

                        @elseif($booking->pembayaran->status == 'pending')

                            <span class="bg-yellow-500 px-4 py-2 rounded-xl">
                                Pending
                            </span>

                        @elseif($booking->pembayaran->status == 'verified')

                            <span class="bg-green-500 px-4 py-2 rounded-xl">
                                Verified
                            </span>

                        @elseif($booking->pembayaran->status == 'rejected')

                            <span class="bg-red-500 px-4 py-2 rounded-xl">
                                Rejected
                            </span>

                        @endif

                    </div>

                </div>

            </div>

            {{-- BODY --}}
            <div class="p-8">

                <div class="grid md:grid-cols-3 gap-6 mb-8">

                    <div>

                        <p class="text-slate-500 text-sm">
                            Total Pembayaran
                        </p>

                        <h3 class="text-2xl font-bold text-green-600 mt-2">

                            Rp
                            {{ number_format($booking->total_price,0,',','.') }}

                        </h3>

                    </div>

                    <div>

                        <p class="text-slate-500 text-sm">
                            Metode Pembayaran
                        </p>

                        <h3 class="text-xl font-bold mt-2">

                            {{ $booking->pembayaran->payment_method ?? 'Belum Dipilih' }}

                        </h3>

                    </div>

                    <div>

                        <p class="text-slate-500 text-sm">
                            Bukti Transfer
                        </p>

                        <h3 class="text-xl font-bold mt-2">

                            @if($booking->pembayaran)

                                Sudah Upload

                            @else

                                Belum Upload

                            @endif

                        </h3>

                    </div>

                </div>

                {{-- BUKTI TF --}}
                @if($booking->pembayaran && $booking->pembayaran->proof_image)

                <div class="mb-8">

                    <p class="font-semibold mb-4">
                        Bukti Pembayaran
                    </p>

                    <img
                        src="{{ asset('storage/'.$booking->pembayaran->proof_image) }}"
                        class="w-72 rounded-2xl border shadow-sm">

                </div>

                @endif

                {{-- ACTION --}}
                <div class="flex flex-wrap gap-3">

                    @if(!$booking->pembayaran)

                        <a
                            href="{{ route('customer.pembayaran.create',$booking->id) }}"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-xl font-semibold">

                            Bayar Sekarang

                        </a>

                    @elseif($booking->pembayaran->status == 'rejected')

                        <a
                            href="{{ route('customer.pembayaran.create',$booking->id) }}"
                            class="bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-xl font-semibold">

                            Upload Ulang

                        </a>

                    @elseif($booking->pembayaran->status == 'pending')

                        <span class="bg-yellow-100 text-yellow-700 px-6 py-3 rounded-xl">

                            Menunggu Verifikasi Admin

                        </span>

                    @elseif($booking->pembayaran->status == 'verified')

                        <span class="bg-green-100 text-green-700 px-6 py-3 rounded-xl">

                            Pembayaran Berhasil Diverifikasi

                        </span>

                    @endif

                </div>

            </div>

        </div>

        @empty

        <div class="bg-white rounded-3xl p-16 text-center shadow-sm">

            <div class="text-7xl mb-4">
                💳
            </div>

            <h2 class="text-3xl font-bold text-slate-800">
                Belum Ada Transaksi
            </h2>

            <p class="text-slate-500 mt-3">
                Silakan booking paket wisata terlebih dahulu.
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