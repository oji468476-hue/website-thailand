<x-layouts.mitra>

<div class="max-w-4xl mx-auto">

    <div class="bg-white rounded-3xl p-10 shadow-md">

        <h1 class="text-4xl font-bold text-gray-800 mb-2">
            ✏️ Edit Paket Wisata
        </h1>

        <p class="text-gray-500 mb-8">
            Perbarui informasi paket wisata.
        </p>

<form action="{{ route('mitra.paket.update', $paket) }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div class="mb-4">

        <label>Nama Paket</label>

        <input
            type="text"
            name="nama_paket"
            value="{{ $paket->nama_paket }}"
            class="w-full border rounded-xl p-3">

    </div>

    <div class="mb-4">

        <label>Deskripsi</label>

        <textarea
            name="deskripsi"
            class="w-full border rounded-xl p-3">{{ $paket->deskripsi }}</textarea>

    </div>

    <div class="mb-4">

        <label>Harga</label>

        <input
            type="number"
            name="harga"
            value="{{ $paket->harga }}"
            class="w-full border rounded-xl p-3">

    </div>

    <div class="mb-4">

        <label>Kuota</label>

        <input
            type="number"
            name="kuota"
            value="{{ $paket->kuota }}"
            class="w-full border rounded-xl p-3">

    </div>

    {{-- FOTO PAKET --}}
    <div class="mb-5">

        <label class="block mb-2 font-semibold">
            Foto Paket
        </label>

        @if($paket->foto)

            <img
                src="{{ asset('storage/'.$paket->foto) }}"
                class="w-48 rounded-xl mb-3">

        @endif

        <input
            type="file"
            name="foto"
            class="w-full border rounded-xl p-3">

    </div>

    <button
        type="submit"
        class="bg-blue-600 text-white px-6 py-3 rounded-xl">

        Update Paket

    </button>

</form>
    </div>

</div>

</x-layouts.mitra>