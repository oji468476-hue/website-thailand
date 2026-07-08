<x-layouts.mitra>

<div class="flex items-center justify-between mb-8">

<div>
    <h1 class="text-4xl font-bold text-gray-800">
        📦 Paket Saya
    </h1>

    <p class="text-gray-500 mt-2">
        Kelola seluruh paket wisata yang Anda miliki.
    </p>
</div>

<a href="{{ route('mitra.paket.create') }}"
   class="bg-cyan-500 hover:bg-cyan-600 text-white px-6 py-4 rounded-2xl font-semibold shadow-lg transition">

    + Tambah Paket

</a>

</div>

<div class="bg-white rounded-3xl shadow-md overflow-hidden">

```
<table class="w-full">

    <thead class="bg-gray-50">

        <tr>

            <th class="px-6 py-4 text-left">Nama Paket</th>
            <th class="px-6 py-4 text-left">Harga</th>
            <th class="px-6 py-4 text-left">Kuota</th>
            <th class="px-6 py-4 text-center">Aksi</th>

        </tr>

    </thead>

    <tbody>

        @forelse($pakets as $paket)

        <tr class="border-t">

            <td class="px-6 py-4 font-semibold">
                {{ $paket->nama_paket }}
            </td>

            <td class="px-6 py-4 text-green-600">
                Rp {{ number_format($paket->harga,0,',','.') }}
            </td>

            <td class="px-6 py-4">
                {{ $paket->kuota }}
            </td>

            <td class="px-6 py-4">

                <div class="flex justify-center gap-3">

                    <a href="{{ route('mitra.paket.edit', $paket->id) }}"
                       class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-2 rounded-xl">

                        Edit

                    </a>

                    <form action="{{ route('mitra.paket.destroy', $paket->id) }}"
                          method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus paket ini?')">

                        @csrf
                        @method('DELETE')

                        <button
                            class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl">

                            Hapus

                        </button>

                    </form>

                </div>

            </td>

        </tr>

        @empty

        <tr>

            <td colspan="4" class="text-center py-12 text-gray-500">

                Belum ada paket.

            </td>

        </tr>

        @endforelse

    </tbody>

</table>

</div>

</x-layouts.mitra>
