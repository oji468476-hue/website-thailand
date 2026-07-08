<x-layouts.admin>
    <h2 class="text-2xl font-bold mb-4">➕ Tambah User</h2>

    <form action="{{ route('admin.users.store') }}" method="POST" class="card-custom max-w-lg">
        @csrf
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" name="nama" required class="w-full border-gray-300 rounded-xl">
            @error('nama') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" required class="w-full border-gray-300 rounded-xl">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Password</label>
            <input type="password" name="password" required class="w-full border-gray-300 rounded-xl">
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Role</label>
            <select name="role" required class="w-full border-gray-300 rounded-xl">
                <option value="">-- Pilih --</option>
                <option value="admin">Admin</option>
                <option value="customer">Customer</option>
                <option value="mitra">Mitra</option>
            </select>
            @error('role') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-xl hover:bg-blue-700">Simpan</button>
    </form>
</x-layouts.admin>