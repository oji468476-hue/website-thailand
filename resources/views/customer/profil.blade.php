<x-layouts.customer>

<div class="max-w-5xl mx-auto">

    @if(session('success'))

        <div class="mb-6 bg-green-100 text-green-700 p-4 rounded-2xl">
            {{ session('success') }}
        </div>

    @endif

    <div class="bg-white rounded-3xl shadow-sm p-10">

        <div class="flex items-center gap-6 mb-10">

            <div class="w-24 h-24 rounded-full bg-yellow-500 flex items-center justify-center text-white text-4xl font-bold">

                {{ strtoupper(substr(Auth::user()->nama,0,1)) }}

            </div>

            <div>

                <h1 class="text-4xl font-bold text-slate-800">
                    {{ Auth::user()->nama }}
                </h1>

                <p class="text-slate-500">
                    Customer ThaiTravel
                </p>

            </div>

        </div>

        <div class="grid md:grid-cols-2 gap-6">

            <div>
                <label class="text-sm text-slate-500">
                    Nama Lengkap
                </label>

                <div class="mt-2 border rounded-xl p-4">
                    {{ Auth::user()->nama }}
                </div>
            </div>

            <div>
                <label class="text-sm text-slate-500">
                    Email
                </label>

                <div class="mt-2 border rounded-xl p-4">
                    {{ Auth::user()->email }}
                </div>
            </div>

            <div>
                <label class="text-sm text-slate-500">
                    Role
                </label>

                <div class="mt-2 border rounded-xl p-4">
                    {{ ucfirst(Auth::user()->role) }}
                </div>
            </div>

            <div>
                <label class="text-sm text-slate-500">
                    Bergabung Sejak
                </label>

                <div class="mt-2 border rounded-xl p-4">
                    {{ Auth::user()->created_at->format('d F Y') }}
                </div>
            </div>

        </div>

        <div class="flex gap-4 mt-8">

            <a href="{{ route('customer.profil.edit') }}"
               class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-xl font-semibold">

                Edit Profil

            </a>

            <a href="{{ route('customer.password.edit') }}"
               class="bg-slate-800 hover:bg-slate-900 text-white px-6 py-3 rounded-xl font-semibold">

                Ganti Password

            </a>

        </div>

    </div>

</div>

</x-layouts.customer>