<x-layouts.mitra>

<div class="max-w-7xl mx-auto">

    <div class="mb-8">

        <h1 class="text-4xl font-bold text-gray-800">
            📋 Booking Masuk
        </h1>

        <p class="text-gray-500 mt-2">
            Daftar customer yang memesan paket milik Anda.
        </p>

    </div>

    <div class="bg-white rounded-3xl shadow-md overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full">

                <thead class="bg-gray-50">

                    <tr>

                        <th class="px-6 py-4 text-left">
                            Customer
                        </th>

                        <th class="px-6 py-4 text-left">
                            Paket
                        </th>

                        <th class="px-6 py-4 text-left">
                            Tanggal Berangkat
                        </th>

                        <th class="px-6 py-4 text-left">
                            Peserta
                        </th>

                        <th class="px-6 py-4 text-left">
                            Total
                        </th>

                        <th class="px-6 py-4 text-left">
                            Status
                        </th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($bookings as $booking)

                    <tr class="border-t hover:bg-gray-50">

                        <td class="px-6 py-4 font-medium">
                            {{ $booking->user->nama ?? '-' }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $booking->paket->nama_paket ?? '-' }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $booking->departure_date?->format('d M Y') }}
                        </td>

                        <td class="px-6 py-4">
                            {{ $booking->participants }}
                        </td>

                        <td class="px-6 py-4 font-semibold text-green-600">
                            Rp {{ number_format($booking->total_price,0,',','.') }}
                        </td>

                        <td class="px-6 py-4">

                            @if($booking->status == 'pending')

                                <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-xl text-sm">
                                    Pending
                                </span>

                            @elseif($booking->status == 'confirmed')

                                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-xl text-sm">
                                    Confirmed
                                </span>

                            @else

                                <span class="bg-gray-100 text-gray-700 px-3 py-1 rounded-xl text-sm">
                                    {{ ucfirst($booking->status) }}
                                </span>

                            @endif

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="6" class="text-center py-12 text-gray-500">

                            Belum ada booking masuk.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</x-layouts.mitra>