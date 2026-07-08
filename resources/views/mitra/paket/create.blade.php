<x-layouts.mitra>

<div class="max-w-4xl mx-auto">
<div class="bg-white rounded-3xl p-10 shadow-md">

    <h1 class="text-4xl font-bold text-gray-800 mb-2">
        ➕ Tambah Paket Wisata
    </h1>

    <p class="text-gray-500 mb-8">
        Tambahkan paket wisata baru untuk customer.
    </p>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-300 text-red-700 p-4 rounded-xl mb-5">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>• {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('mitra.paket.store') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="mb-6">
            <label class="block font-semibold mb-3">
                Nama Paket
            </label>

            <input
                type="text"
                name="nama_paket"
                class="w-full border border-gray-200 rounded-2xl px-5 py-4">
        </div>

        <div class="mb-6">
            <label class="block font-semibold mb-3">
                Deskripsi
            </label>

            <textarea
                name="deskripsi"
                rows="5"
                class="w-full border border-gray-200 rounded-2xl px-5 py-4"></textarea>
        </div>

        <div class="grid grid-cols-2 gap-5 mb-6">

            <div>
                <label class="block font-semibold mb-3">
                    Harga
                </label>

                <input
                    type="number"
                    name="harga"
                    class="w-full border border-gray-200 rounded-2xl px-5 py-4">
            </div>

            <div>
                <label class="block font-semibold mb-3">
                    Kuota
                </label>

                <input
                    type="number"
                    name="kuota"
                    class="w-full border border-gray-200 rounded-2xl px-5 py-4">
            </div>

        </div>

<div class="mb-6">

    <label class="block font-semibold mb-3">
        Foto Paket
    </label>

    <input
        type="file"
        name="foto"
        id="foto"
        accept="image/jpeg,image/png,image/webp"
        class="w-full border border-gray-200 rounded-2xl px-5 py-4">

    <div class="mt-5">

        <img
            id="preview"
            src=""
            alt="Preview Foto"
            class="hidden w-full max-w-md h-60 object-cover rounded-2xl shadow-lg border border-gray-200"
        >

    </div>

</div>

        <button
            type="submit"
            class="mt-4 bg-cyan-500 hover:bg-cyan-600 text-white px-8 py-4 rounded-2xl font-semibold shadow-lg transition">

            Simpan Paket

        </button>

    </form>

</div>

</div>
<script>

document.addEventListener('DOMContentLoaded', function(){

    const foto =
    document.getElementById('foto');

    const preview =
    document.getElementById('preview');

    foto.addEventListener('change', function(e){

        const file = e.target.files[0];

        if(file){

            preview.src =
            URL.createObjectURL(file);

            preview.classList.remove('hidden');

        }

    });

});

</script>

</x-layouts.mitra>
