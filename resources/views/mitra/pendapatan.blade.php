<x-layouts.mitra>

<div class="max-w-7xl mx-auto">

    <div class="mb-8">

        <h1 class="text-4xl font-bold text-gray-800">
            💰 Pendapatan Mitra
        </h1>

        <p class="text-gray-500 mt-2">
            Ringkasan seluruh pendapatan dari booking yang telah dikonfirmasi.
        </p>

    </div>

    {{-- CARD --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

        <div class="bg-white p-8 rounded-3xl shadow-md">

            <p class="text-gray-500">
                Total Pendapatan
            </p>

            <h2 class="text-4xl font-bold text-green-600 mt-3">
                Rp {{ number_format($totalPendapatan,0,',','.') }}
            </h2>

        </div>

        <div class="bg-white p-8 rounded-3xl shadow-md">

            <p class="text-gray-500">
                Booking Confirmed
            </p>

            <h2 class="text-4xl font-bold text-cyan-600 mt-3">
                {{ $bookings->count() }}
            </h2>

        </div>

        <div class="bg-white p-8 rounded-3xl shadow-md">

            <p class="text-gray-500">
                Rata-rata Transaksi
            </p>

            <h2 class="text-4xl font-bold text-yellow-500 mt-3">

                Rp
                {{ number_format(
                    $bookings->count()
                        ? $totalPendapatan / $bookings->count()
                        : 0,
                    0,
                    ',',
                    '.'
                ) }}

            </h2>

        </div>

    </div>

    {{-- RIWAYAT --}}
    <div class="bg-white rounded-3xl shadow-md overflow-hidden">

        <div class="p-6 border-b">

            <h2 class="text-2xl font-bold">
                📋 Riwayat Pendapatan
            </h2>

        </div>

        <table class="w-full">

            <thead class="bg-gray-50">

                <tr>

                    <th class="text-left px-6 py-4">
                        Customer
                    </th>

                    <th class="text-left px-6 py-4">
                        Paket
                    </th>

                    <th class="text-left px-6 py-4">
                        Tanggal
                    </th>

                    <th class="text-left px-6 py-4">
                        Total
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($bookings as $booking)

                <tr class="border-t">

                    <td class="px-6 py-4">
                        {{ $booking->user->nama }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $booking->paket->nama_paket }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $booking->created_at->format('d M Y') }}
                    </td>

                    <td class="px-6 py-4 text-green-600 font-semibold">

                        Rp {{ number_format($booking->total_price,0,',','.') }}

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="4" class="text-center py-10 text-gray-500">

                        Belum ada pendapatan.

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</x-layouts.mitra>