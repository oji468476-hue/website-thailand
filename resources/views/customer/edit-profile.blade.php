<x-layouts.customer>

<div class="max-w-3xl mx-auto">

    <div class="bg-white rounded-3xl shadow-sm p-10">

        <h1 class="text-3xl font-bold mb-8">
            Edit Profil
        </h1>

        <form method="POST"
              action="{{ route('customer.profil.update') }}">

            @csrf
            @method('PUT')

            <div class="mb-5">

                <label class="block mb-2">
                    Nama
                </label>

                <input
                    type="text"
                    name="nama"
                    value="{{ Auth::user()->nama }}"
                    class="w-full border rounded-xl px-4 py-3">

            </div>

            <div class="mb-5">

                <label class="block mb-2">
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    value="{{ Auth::user()->email }}"
                    class="w-full border rounded-xl px-4 py-3">

            </div>

            <button
                type="submit"
                class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-xl">

                Simpan Perubahan

            </button>

        </form>

    </div>

</div>

</x-layouts.customer>