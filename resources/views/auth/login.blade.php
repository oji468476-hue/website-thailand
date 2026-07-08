<x-guest-layout>

<div class="w-full">

    <div class="mb-10">

        <span class="inline-block px-4 py-2 rounded-full bg-yellow-100 text-yellow-700 text-sm font-semibold">
            THAITRAVEL SYSTEM
        </span>

        <h1 class="mt-5 text-4xl font-extrabold text-[#071739]">
            Masuk ke Akun
        </h1>

        <p class="mt-3 text-gray-500 leading-relaxed">
            Masukkan email dan password untuk mengakses sistem pemesanan wisata Thailand.
        </p>

    </div>

    @if ($errors->any())

        <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-5 py-4 rounded-2xl">

            <ul class="space-y-1">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <form method="POST" action="{{ route('login') }}">

        @csrf

        {{-- EMAIL --}}
        <div class="mb-5">

            <label class="block mb-2 text-sm font-semibold text-gray-700">
                Email
            </label>

            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
                placeholder="Masukkan email"
                class="w-full px-5 py-4 rounded-2xl border border-gray-200 bg-gray-50 focus:border-yellow-500 focus:ring-2 focus:ring-yellow-200 outline-none transition">

        </div>

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

        {{-- OPTIONS --}}
        <div class="flex items-center justify-between mb-8">

            <label class="flex items-center gap-2 text-sm text-gray-600">

                <input
                    type="checkbox"
                    name="remember"
                    class="rounded border-gray-300 text-yellow-500 focus:ring-yellow-400">

                Ingat Saya

            </label>

            @if (Route::has('password.request'))

                <a
                    href="{{ route('password.request') }}"
                    class="text-sm font-medium text-yellow-600 hover:text-yellow-700">

                    Lupa Password?

                </a>

            @endif

        </div>

        {{-- BUTTON --}}
        <button
            type="submit"
            class="w-full py-4 rounded-2xl bg-[#071739] hover:bg-[#0b2456] text-white font-semibold shadow-lg transition">

            Masuk

        </button>

    </form>

    {{-- REGISTER --}}
    <div class="mt-8 text-center">

        <p class="text-gray-500">

            Belum memiliki akun?

            <a
                href="{{ route('register') }}"
                class="font-semibold text-yellow-600 hover:text-yellow-700">

                Registrasi

            </a>

        </p>

    </div>

    {{-- FOOTER INFO --}}
    <div class="mt-10 pt-6 border-t border-gray-100">

        <div class="grid grid-cols-3 gap-4 text-center">

            <div>

                <h3 class="font-bold text-[#071739] text-lg">
                    20+
                </h3>

                <p class="text-xs text-gray-500">
                    Paket Wisata
                </p>

            </div>

            <div>

                <h3 class="font-bold text-[#071739] text-lg">
                    500+
                </h3>

                <p class="text-xs text-gray-500">
                    Pelanggan
                </p>

            </div>

            <div>

                <h3 class="font-bold text-[#071739] text-lg">
                    24/7
                </h3>

                <p class="text-xs text-gray-500">
                    Dukungan
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