<x-guest-layout>

<div class="w-full">

    <div class="mb-8">

        <span class="inline-block px-4 py-2 rounded-full bg-yellow-100 text-yellow-700 text-sm font-semibold">
            ThaiTravel System
        </span>

        <h1 class="mt-5 text-4xl font-extrabold text-[#071739]">
            Create Account 
        </h1>

        <p class="mt-2 text-gray-500">
            Daftar sekarang dan mulai jelajahi destinasi terbaik Thailand bersama ThaiTravel.
        </p>

    </div>

    @if ($errors->any())

        <div class="mb-6 bg-red-100 border border-red-200 text-red-700 px-4 py-4 rounded-2xl">

            <ul class="space-y-1">

                @foreach ($errors->all() as $error)

                    <li>• {{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <form method="POST" action="{{ route('register') }}">

        @csrf

        {{-- Nama --}}
        <div class="mb-5">

            <label class="block mb-2 text-sm font-semibold text-gray-700">
                Nama Lengkap
            </label>

            <input
    type="text"
    name="nama"
    value="{{ old('nama') }}"
    required
    autofocus
    placeholder="Masukkan nama lengkap"
    class="w-full px-5 py-4 rounded-2xl border border-gray-200 bg-gray-50 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 outline-none transition">

        {{-- Email --}}
        <div class="mb-5">

            <label class="block mb-2 text-sm font-semibold text-gray-700">
                Email Address
            </label>

            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                placeholder="Masukkan email"
                class="w-full px-5 py-4 rounded-2xl border border-gray-200 bg-gray-50 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 outline-none transition">

        </div>
        <div class="mt-4">
    <label>Daftar Sebagai</label>

    <select
        name="role"
        class="w-full mt-2 border rounded-lg p-3">

        <option value="customer">
            Customer
        </option>

        <option value="mitra">
            Mitra Travel
        </option>

    </select>
</div>

        {{-- Password --}}
        <div class="mb-5">

            <label class="block mb-2 text-sm font-semibold text-gray-700">
                Password
            </label>

           <div class="relative">

    <input
        id="password"
        type="password"
        name="password"
        class="w-full border rounded-lg p-3">

    <button
        type="button"
        onclick="togglePassword()"
        class="absolute right-3 top-1/2 -translate-y-1/2">

        👁️

    </button>

</div>

        </div>

        {{-- Konfirmasi Password --}}
        <div class="mb-6">

            <label class="block mb-2 text-sm font-semibold text-gray-700">
                Konfirmasi Password
            </label>

            <input
                type="password"
                name="password_confirmation"
                required
                placeholder="Ulangi password"
                class="w-full px-5 py-4 rounded-2xl border border-gray-200 bg-gray-50 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 outline-none transition">

        </div>

        {{-- Tombol Register --}}
        <button
            type="submit"
            class="w-full py-4 rounded-2xl bg-[#071739] hover:bg-[#0b2456] text-white font-semibold text-lg shadow-lg transition duration-300">

            Buat Akun

        </button>

    </form>

    {{-- Login Link --}}
    <div class="mt-8 text-center">

        <p class="text-gray-500">

            Sudah punya akun?

            <a
                href="{{ route('login') }}"
                class="font-semibold text-yellow-600 hover:text-yellow-700">

                Login Sekarang

            </a>

        </p>

    </div>

    {{-- Statistik --}}
    <div class="mt-8 pt-6 border-t border-gray-100">

        <div class="grid grid-cols-3 gap-4 text-center">

            <div>

                <h3 class="font-bold text-[#071739]">
                    20+
                </h3>

                <p class="text-xs text-gray-500">
                    Paket Wisata
                </p>

            </div>

            <div>

                <h3 class="font-bold text-[#071739]">
                    500+
                </h3>

                <p class="text-xs text-gray-500">
                    Customer
                </p>

            </div>

            <div>

                <h3 class="font-bold text-[#071739]">
                    24/7
                </h3>

                <p class="text-xs text-gray-500">
                    Support
                </p>

            </div>

        </div>

    </div>
    <script>

function togglePassword()
{
    const password =
    document.getElementById('password');

    if(password.type === 'password')
    {
        password.type = 'text';
    }
    else
    {
        password.type = 'password';
    }
}

</script>

</div>

</x-guest-layout>