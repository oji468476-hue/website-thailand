<x-layouts.admin>
    <h2 class="text-2xl font-bold mb-4">➕ Tambah Paket Wisata</h2>

    <form action="{{ route('admin.pakets.store') }}" method="POST" class="card-custom max-w-lg">
        @csrf
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Nama Paket</label>
            <input type="text" name="nama_paket" required class="w-full border-gray-300 rounded-xl">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="deskripsi" rows="3" required class="w-full border-gray-300 rounded-xl"></textarea>
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Harga</label>
            <input type="number" name="harga" required class="w-full border-gray-300 rounded-xl">
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Kuota</label>
            <input type="number" name="kuota" required class="w-full border-gray-300 rounded-xl">
        </div>
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-xl hover:bg-blue-700">Simpan</button>
    </form>
</x-layouts.admin>