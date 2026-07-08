<x-layouts.customer>

<div class="max-w-6xl mx-auto">

    <div class="mb-8">

        <h1 class="text-4xl font-bold text-slate-900">
            Form Pemesanan Paket
        </h1>

        <p class="text-slate-500 mt-2">
            Lengkapi data pemesanan untuk melanjutkan reservasi perjalanan.
        </p>

    </div>

    <div class="grid lg:grid-cols-3 gap-8">

        {{-- FORM --}}
        <div class="lg:col-span-2">

            <div class="bg-white rounded-3xl shadow-sm border border-slate-200 p-8">

                @if(session('success'))
                    <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-2xl">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 bg-red-100 border border-red-300 text-red-700 px-5 py-4 rounded-2xl">
                        {{ session('error') }}
                    </div>
                @endif

                <form
                    id="bookingForm"
                    action="{{ route('customer.booking.store') }}"
                    method="POST">

                    @csrf

                    <input
                        type="hidden"
                        name="paket_id"
                        value="{{ $paket->id }}">

                    {{-- TANGGAL --}}
                    <div class="mb-8">

                        <label class="block font-semibold text-slate-800 mb-3">
                            Tanggal Keberangkatan
                        </label>

                        <input
                            type="date"
                            name="departure_date"
                            min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                            required
                            class="w-full rounded-2xl border border-slate-300 px-5 py-4 focus:ring-2 focus:ring-yellow-400 focus:border-yellow-400">

                        @error('departure_date')
                            <p class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    {{-- PESERTA --}}
                    <div class="mb-8">

                        <label class="block font-semibold text-slate-800 mb-3">
                            Jumlah Peserta
                        </label>

                        <div class="flex items-center gap-4">

                            <button
                                type="button"
                                id="minusBtn"
                                class="w-12 h-12 rounded-xl bg-slate-100 hover:bg-slate-200 font-bold text-xl">
                                -
                            </button>

                            <input
                                id="participants"
                                type="number"
                                name="participants"
                                value="1"
                                min="1"
                                required
                                class="w-28 text-center rounded-xl border border-slate-300 py-3 font-bold">

                            <button
                                type="button"
                                id="plusBtn"
                                class="w-12 h-12 rounded-xl bg-slate-100 hover:bg-slate-200 font-bold text-xl">
                                +
                            </button>

                        </div>

                        @error('participants')
                            <p class="text-red-500 text-sm mt-2">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    {{-- TOTAL --}}
                    <div class="bg-yellow-50 border border-yellow-200 rounded-2xl p-6 mb-8">

                        <p class="text-slate-500">
                            Total Pembayaran
                        </p>

                        <h3
                            id="totalDisplay"
                            class="text-4xl font-bold text-yellow-600 mt-2">

                            Rp {{ number_format($paket->harga,0,',','.') }}

                        </h3>

                    </div>

                    <button
                        type="submit"
                        class="w-full bg-[#071739] hover:bg-[#0d285f] text-white py-4 rounded-2xl font-bold text-lg transition">

                        Lanjutkan Pemesanan

                    </button>

                </form>

            </div>

        </div>

        {{-- SIDEBAR --}}
        <div>

            <div class="bg-white rounded-3xl shadow-sm border border-slate-200 p-8 sticky top-8">

                <h2 class="text-2xl font-bold text-slate-900 mb-6">
                    Ringkasan Paket
                </h2>

                <div class="space-y-5">

                    <div>
                        <p class="text-slate-500 text-sm">
                            Nama Paket
                        </p>

                        <h3 class="font-bold text-lg mt-1">
                            {{ $paket->nama_paket }}
                        </h3>
                    </div>

                    <div>
                        <p class="text-slate-500 text-sm">
                            Harga per Orang
                        </p>

                        <h3 class="font-bold text-yellow-600 text-xl mt-1">
                            Rp {{ number_format($paket->harga,0,',','.') }}
                        </h3>
                    </div>

                    <div>
                        <p class="text-slate-500 text-sm">
                            Kuota Tersedia
                        </p>

                        <h3 class="font-semibold mt-1">
                            {{ $paket->kuota }} Orang
                        </h3>
                    </div>

                </div>

                <hr class="my-6">

                <p class="text-slate-600 leading-relaxed">
                    {{ $paket->deskripsi }}
                </p>

            </div>

        </div>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

const price = {{ $paket->harga }};

const participantsInput =
    document.getElementById('participants');

const totalDisplay =
    document.getElementById('totalDisplay');

const plusBtn =
    document.getElementById('plusBtn');

const minusBtn =
    document.getElementById('minusBtn');

function updateTotal()
{
    let jumlah =
        parseInt(participantsInput.value) || 1;

    totalDisplay.innerText =
        'Rp ' +
        (jumlah * price).toLocaleString('id-ID');
}

plusBtn.addEventListener('click', () => {

    participantsInput.value =
        parseInt(participantsInput.value) + 1;

    updateTotal();

});

minusBtn.addEventListener('click', () => {

    let current =
        parseInt(participantsInput.value);

    if(current > 1)
    {
        participantsInput.value =
            current - 1;

        updateTotal();
    }

});

participantsInput.addEventListener(
    'input',
    updateTotal
);

document
.getElementById('bookingForm')
.addEventListener('submit', function(e){

    e.preventDefault();

    const peserta =
        participantsInput.value;

    const total =
        (peserta * price)
        .toLocaleString('id-ID');

    Swal.fire({

        title: 'Konfirmasi Pemesanan',

        html: `
            <div style="text-align:left">

                <p><strong>Paket</strong></p>
                <p>{{ $paket->nama_paket }}</p>

                <br>

                <p><strong>Peserta</strong></p>
                <p>${peserta} Orang</p>

                <br>

                <p><strong>Total Pembayaran</strong></p>
                <p>Rp ${total}</p>

            </div>
        `,

        icon: 'question',

        showCancelButton: true,

        confirmButtonColor: '#eab308',

        cancelButtonColor: '#64748b',

        confirmButtonText: 'Ya, Lanjutkan',

        cancelButtonText: 'Batal'

    }).then((result) => {

        if(result.isConfirmed)
        {
            document
                .getElementById('bookingForm')
                .submit();
        }

    });

});

</script>

</x-layouts.customer>