<x-layouts.admin>

<div class="max-w-7xl mx-auto">

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-4xl font-bold text-slate-900">
            Kelola Paket Wisata
        </h1>

        <p class="text-slate-500 mt-2">
            Kelola seluruh paket wisata Thailand yang tersedia.
        </p>

    </div>

    <a
        href="{{ route('admin.pakets.create') }}"
        class="bg-[#071739] hover:bg-[#0d285f] text-white px-6 py-3 rounded-2xl font-semibold shadow">

        + Tambah Paket

    </a>

</div>

@if(session('success'))

    <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-2xl">

        {{ session('success') }}

    </div>

@endif

<div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">

    @foreach($pakets as $paket)

    <div class="bg-white rounded-3xl shadow-sm overflow-hidden border border-slate-200 hover:shadow-lg transition">

        {{-- GAMBAR --}}
        <img
src="{{ $paket->foto
    ? asset('storage/' . $paket->foto)
    : asset('storage/pakets/default.jpg') }}"
            class="w-full h-52 object-cover">

        <div class="p-6">

            {{-- STATUS --}}
            <div class="mb-4">

                @if($paket->kuota == 0)

                    <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full text-sm font-semibold">
                        Penuh
                    </span>

                @elseif($paket->kuota <= 10)

                    <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm font-semibold">
                        Hampir Penuh
                    </span>

                @else

                    <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm font-semibold">
                        Tersedia
                    </span>

                @endif

            </div>

            {{-- NAMA --}}
            <h2 class="text-2xl font-bold text-slate-900 mb-3">

                {{ $paket->nama_paket }}

            </h2>

            {{-- DESKRIPSI --}}
            <p class="text-slate-500 text-sm leading-relaxed mb-5">

                {{ \Illuminate\Support\Str::limit($paket->deskripsi, 100) }}

            </p>

            {{-- HARGA --}}
            <div class="flex justify-between items-center mb-4">

                <div>

                    <p class="text-slate-500 text-sm">
                        Harga
                    </p>

                    <h3 class="text-xl font-bold text-yellow-600">

                        Rp {{ number_format($paket->harga,0,',','.') }}

                    </h3>

                </div>

                <div class="text-right">

                    <p class="text-slate-500 text-sm">
                        Kuota
                    </p>

                    <h3 class="font-bold text-slate-900">

                        {{ $paket->kuota }} Orang

                    </h3>

                </div>

            </div>

            {{-- AKSI --}}
            <div class="flex gap-3 mt-6">

                <a
                    href="{{ route('admin.pakets.edit', $paket) }}"
                    class="flex-1 bg-blue-500 hover:bg-blue-600 text-white text-center py-3 rounded-xl font-semibold">

                    Edit

                </a>

                <form
                    action="{{ route('admin.pakets.destroy', $paket) }}"
                    method="POST"
                    class="deleteForm flex-1">

                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="w-full bg-red-500 hover:bg-red-600 text-white py-3 rounded-xl font-semibold">

                        Hapus

                    </button>

                </form>

            </div>

        </div>

    </div>

    @endforeach

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

document.querySelectorAll('.deleteForm')
.forEach(form => {

    form.addEventListener('submit', function(e){

        e.preventDefault();

        Swal.fire({

            title: 'Hapus Paket',

            text: 'Paket wisata akan dihapus permanen.',

            icon: 'warning',

            showCancelButton: true,

            confirmButtonColor: '#ef4444',

            cancelButtonText: 'Batal',

            confirmButtonText: 'Ya, Hapus'

        }).then((result)=>{

            if(result.isConfirmed)
            {
                form.submit();
            }

        });

    });

});

</script>

</x-layouts.admin>
