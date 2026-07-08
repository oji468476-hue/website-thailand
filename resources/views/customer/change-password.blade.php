<x-layouts.customer>

<div class="max-w-3xl mx-auto">

    <div class="bg-white rounded-3xl shadow-sm p-10">

        <h1 class="text-3xl font-bold mb-8">
            Ganti Password
        </h1>

        <form method="POST"
              action="{{ route('customer.password.update') }}">

            @csrf
            @method('PUT')

            <div class="mb-5">

                <label class="block mb-2">
                    Password Lama
                </label>

                <input
                    type="password"
                    name="current_password"
                    class="w-full border rounded-xl px-4 py-3">

            </div>

            <div class="mb-5">

                <label class="block mb-2">
                    Password Baru
                </label>

                <input
                    type="password"
                    name="password"
                    class="w-full border rounded-xl px-4 py-3">

            </div>

            <div class="mb-5">

                <label class="block mb-2">
                    Konfirmasi Password
                </label>

                <input
                    type="password"
                    name="password_confirmation"
                    class="w-full border rounded-xl px-4 py-3">

            </div>

            <button
                type="submit"
                class="bg-slate-800 hover:bg-slate-900 text-white px-6 py-3 rounded-xl">

                Simpan Password

            </button>

        </form>

    </div>

</div>

</x-layouts.customer>