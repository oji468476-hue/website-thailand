<x-layouts.admin>

<div class="max-w-6xl mx-auto">


{{-- HEADER --}}
<div class="bg-gradient-to-r from-blue-700 via-blue-600 to-cyan-500 rounded-3xl p-8 text-white mb-8 shadow-xl">

    <h1 class="text-4xl font-bold">
         Edit Paket Wisata
    </h1>

    <p class="mt-2 text-blue-100">
        Perbarui informasi paket wisata dan foto paket.
    </p>

</div>

{{-- ERROR --}}
@if ($errors->any())

    <div class="bg-red-100 border border-red-300 text-red-700 p-5 rounded-2xl mb-6">

        <ul class="space-y-1">

            @foreach ($errors->all() as $error)

                <li>• {{ $error }}</li>

            @endforeach

        </ul>

    </div>

@endif

<form
    action="{{ route('admin.pakets.update', $paket) }}"
    method="POST"
    enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div class="bg-white rounded-3xl shadow-xl p-8">

        <div class="grid lg:grid-cols-2 gap-8">

            {{-- KIRI --}}
            <div>

                <div class="mb-6">

                    <label class="block font-semibold text-gray-700 mb-3">
                        Nama Paket
                    </label>

                    <input
                        type="text"
                        name="nama_paket"
                        value="{{ old('nama_paket', $paket->nama_paket) }}"
                        required
                        class="w-full border border-gray-300 rounded-2xl px-5 py-4 focus:ring-2 focus:ring-blue-500">

                </div>

                <div class="mb-6">

                    <label class="block font-semibold text-gray-700 mb-3">
                        Deskripsi
                    </label>

                    <textarea
                        name="deskripsi"
                        rows="6"
                        required
                        class="w-full border border-gray-300 rounded-2xl px-5 py-4 focus:ring-2 focus:ring-blue-500">{{ old('deskripsi', $paket->deskripsi) }}</textarea>

                </div>

                <div class="grid grid-cols-2 gap-5">

                    <div>

                        <label class="block font-semibold text-gray-700 mb-3">
                            Harga
                        </label>

                        <input
                            type="number"
                            name="harga"
                            value="{{ old('harga', $paket->harga) }}"
                            required
                            class="w-full border border-gray-300 rounded-2xl px-5 py-4 focus:ring-2 focus:ring-blue-500">

                    </div>

                    <div>

                        <label class="block font-semibold text-gray-700 mb-3">
                            Kuota
                        </label>

                        <input
                            type="number"
                            name="kuota"
                            value="{{ old('kuota', $paket->kuota) }}"
                            required
                            class="w-full border border-gray-300 rounded-2xl px-5 py-4 focus:ring-2 focus:ring-blue-500">

                    </div>

                </div>

            </div>

            {{-- KANAN --}}
            <div>

                <label class="block font-semibold text-gray-700 mb-3">
                    Foto Paket Saat Ini
                </label>

                @if($paket->foto)

                    <img
                        src="{{ asset('storage/'.$paket->foto) }}"
                        class="w-full h-72 object-cover rounded-3xl shadow-md mb-6">

                @else

                    <div class="w-full h-72 rounded-3xl bg-gray-100 flex items-center justify-center text-gray-400 mb-6">
                        Tidak ada foto
                    </div>

                @endif


                <label class="block font-semibold text-gray-700 mb-3">
                    Ganti Foto Paket
                </label>

                <input
                    type="file"
                    name="foto"
                    id="foto"
                    accept="image/jpeg,image/png,image/jpg"
                    class="w-full border border-gray-300 rounded-2xl px-5 py-4">

                <p class="text-sm text-gray-500 mt-2">
                    Format: JPG, JPEG, PNG
                </p>

                {{-- PREVIEW FOTO BARU --}}
                <div class="mt-6">

                    <p class="font-semibold text-gray-700 mb-3">
                        Preview Foto Baru
                    </p>

                    <img
                        id="preview"
                        class="hidden w-full h-72 object-cover rounded-3xl shadow-md">

                </div>

            </div>

        </div>

        <div class="mt-10 flex gap-4">

            <button
                type="submit"
                class="bg-gradient-to-r from-blue-600 to-cyan-500 text-white px-10 py-4 rounded-2xl font-bold shadow-lg hover:scale-105 transition">

                💾 Simpan Perubahan

            </button>

            <a
                href="{{ route('admin.pakets.index') }}"
                class="bg-gray-200 hover:bg-gray-300 px-8 py-4 rounded-2xl font-semibold">

                Batal

            </a>

        </div>

    </div>

</form>

</div>

<script>

document.getElementById('foto').addEventListener('change', function(e){

    const file = e.target.files[0];

    if(file){

        const reader = new FileReader();

        reader.onload = function(event){

            const preview = document.getElementById('preview');

            preview.src = event.target.result;
            preview.classList.remove('hidden');

        }

        reader.readAsDataURL(file);

    }

});

</script>

</x-layouts.admin>
