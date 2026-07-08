<x-layouts.admin>
    <h2 class="text-2xl font-bold mb-4">✏️ Edit User: {{ $user->nama }}</h2>

    <form action="{{ route('admin.users.update', $user) }}" method="POST" class="card-custom max-w-lg">
        @csrf @method('PUT')
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" name="nama" value="{{ old('nama', $user->nama) }}" required class="w-full border-gray-300 rounded-xl">
            @error('nama') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" required class="w-full border-gray-300 rounded-xl">
            @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Role</label>
            <select name="role" required class="w-full border-gray-300 rounded-xl">
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="customer" {{ $user->role == 'customer' ? 'selected' : '' }}>Customer</option>
                <option value="mitra" {{ $user->role == 'mitra' ? 'selected' : '' }}>Mitra</option>
                <option value="owner" {{ $user->role == 'owner' ? 'selected' : '' }}>Owner</option>
            </select>
            @error('role') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-xl hover:bg-blue-700">Perbarui</button>
    </form>
</x-layouts.admin>