<x-layouts.customer>

<div class="max-w-7xl mx-auto">

    {{-- HEADER --}}
    <div class="mb-8">

        <h1 class="text-4xl font-bold text-slate-900">
            💳 Pembayaran Booking
        </h1>

        <p class="text-slate-500 mt-2">
            Selesaikan pembayaran untuk mengkonfirmasi pemesanan paket wisata Anda.
        </p>

    </div>


    {{-- STEP PROGRESS --}}
    <div class="bg-white rounded-3xl shadow-sm p-6 mb-8">

        <div class="flex items-center justify-center flex-wrap gap-4">

            <div class="flex items-center gap-3">

                <div
                    class="w-12 h-12 rounded-full bg-green-500 text-white flex items-center justify-center font-bold">

                    ✓

                </div>

                <span class="font-semibold">
                    Booking
                </span>

            </div>

            <div class="w-16 h-1 bg-yellow-500 rounded-full"></div>

            <div class="flex items-center gap-3">

                <div
                    class="w-12 h-12 rounded-full bg-yellow-500 text-white flex items-center justify-center font-bold">

                    2

                </div>

                <span class="font-semibold text-yellow-600">
                    Pembayaran
                </span>

            </div>

            <div class="w-16 h-1 bg-slate-200 rounded-full"></div>

            <div class="flex items-center gap-3">

                <div
                    class="w-12 h-12 rounded-full bg-slate-200 flex items-center justify-center font-bold">

                    3

                </div>

                <span class="text-slate-500">
                    Verifikasi
                </span>

            </div>

            <div class="w-16 h-1 bg-slate-200 rounded-full"></div>

            <div class="flex items-center gap-3">

                <div
                    class="w-12 h-12 rounded-full bg-slate-200 flex items-center justify-center font-bold">

                    4

                </div>

                <span class="text-slate-500">
                    Selesai
                </span>

            </div>

        </div>

    </div>


    {{-- COUNTDOWN --}}
    <div
        class="bg-gradient-to-r from-red-50 to-orange-50 border border-red-200 rounded-3xl p-6 mb-8">

        <div class="flex justify-between items-center flex-wrap gap-4">

            <div>

                <h3 class="text-lg font-bold text-red-600">
                    ⏳ Menunggu Pembayaran
                </h3>

                <p class="text-slate-500 mt-1">
                    Selesaikan pembayaran sebelum waktu habis.
                </p>

            </div>

            <div>

                <h2
                    id="countdown"
                    class="text-5xl font-bold text-red-600">

                    24:00:00

                </h2>

            </div>

        </div>

    </div>


    <div class="grid lg:grid-cols-3 gap-8">

        {{-- KIRI --}}
        <div class="lg:col-span-2">

            <form
                action="{{ route('customer.pembayaran.store', $booking->id) }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                <input
                    type="hidden"
                    name="payment_method"
                    id="payment_method">


                {{-- METODE PEMBAYARAN --}}
                <div class="bg-white rounded-3xl shadow-sm p-8 mb-8">

                    <div class="flex items-center justify-between mb-8">

                        <h2 class="text-2xl font-bold text-slate-900">
                            Pilih Metode Pembayaran
                        </h2>

                        <span
                            id="selectedMethod"
                            class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-xl font-semibold">

                            Belum Dipilih

                        </span>

                    </div>


                    {{-- TAB --}}
                    <div class="flex gap-3 flex-wrap mb-8">

                        <button
                            type="button"
                            onclick="showTab('qris')"
                            class="tab-btn bg-yellow-500 text-white px-5 py-3 rounded-xl font-semibold">

                            QRIS

                        </button>

                        <button
                            type="button"
                            onclick="showTab('bank')"
                            class="tab-btn bg-slate-100 hover:bg-slate-200 px-5 py-3 rounded-xl font-semibold">

                            Transfer Bank

                        </button>


                        <button
                            type="button"
                            onclick="showTab('va')"
                            class="tab-btn bg-slate-100 hover:bg-slate-200 px-5 py-3 rounded-xl font-semibold">

                            Virtual Account

                        </button>

                    </div>
                    {{-- QRIS TAB --}}
                    <div
                        id="qris-tab"
                        class="payment-tab">

                        <div
                            class="border border-slate-200 rounded-3xl p-8">

                            <div class="text-center">

                                <img
                                    src="{{ asset('images/qris.png') }}"
                                    alt="QRIS"
                                    class="w-72 mx-auto rounded-2xl border shadow-sm">

                                <h3
                                    class="text-2xl font-bold mt-6">

                                    QRIS ThaiTravel

                                </h3>

                                <p
                                    class="text-slate-500 mt-2">

                                    Scan QR menggunakan Dana, OVO,
                                    GoPay, ShopeePay atau Mobile Banking.

                                </p>

                                <button
                                    type="button"
                                    onclick="selectMethod('QRIS')"
                                    class="mt-6 bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-xl font-semibold">

                                    Pilih QRIS

                                </button>

                            </div>

                        </div>

                    </div>


                    {{-- TRANSFER BANK --}}
                    <div
                        id="bank-tab"
                        class="payment-tab hidden">

                        <div
                            class="grid md:grid-cols-2 gap-5">

                            {{-- BCA --}}
                            <div
                                class="border border-slate-200 rounded-3xl p-6">

                                <div
                                    class="flex justify-between items-start">

                                    <div>

                                        <h3
                                            class="text-xl font-bold">

                                            🏦 BCA

                                        </h3>

                                        <p
                                            class="text-slate-500 mt-3">

                                            Nomor Rekening

                                        </p>

                                        <h4
                                            class="text-2xl font-bold">

                                            1234567890

                                        </h4>

                                        <p
                                            class="mt-2 text-slate-500">

                                            ThaiTravel Indonesia

                                        </p>

                                    </div>

                                </div>

                                <div
                                    class="flex gap-3 mt-6">

                                    <button
                                        type="button"
                                        onclick="copyText('1234567890')"
                                        class="bg-slate-900 text-white px-5 py-3 rounded-xl">

                                        Salin Rekening

                                    </button>

                                    <button
                                        type="button"
                                        onclick="selectMethod('BCA')"
                                        class="bg-yellow-500 text-white px-5 py-3 rounded-xl">

                                        Pilih BCA

                                    </button>

                                </div>

                            </div>


                            {{-- BNI --}}
                            <div
                                class="border border-slate-200 rounded-3xl p-6">

                                <h3
                                    class="text-xl font-bold">

                                    🏦 BNI

                                </h3>

                                <p
                                    class="text-slate-500 mt-3">

                                    Nomor Rekening

                                </p>

                                <h4
                                    class="text-2xl font-bold">

                                    9876543210

                                </h4>

                                <p
                                    class="mt-2 text-slate-500">

                                    ThaiTravel Indonesia

                                </p>

                                <div
                                    class="flex gap-3 mt-6">

                                    <button
                                        type="button"
                                        onclick="copyText('9876543210')"
                                        class="bg-slate-900 text-white px-5 py-3 rounded-xl">

                                        Salin Rekening

                                    </button>

                                    <button
                                        type="button"
                                        onclick="selectMethod('BNI')"
                                        class="bg-yellow-500 text-white px-5 py-3 rounded-xl">

                                        Pilih BNI

                                    </button>

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- VIRTUAL ACCOUNT --}}
                    <div
                        id="va-tab"
                        class="payment-tab hidden">

                        <div
                            class="border rounded-3xl p-8">

                            <h3
                                class="text-2xl font-bold mb-4">

                                Virtual Account

                            </h3>

                            <div
                                class="bg-slate-100 rounded-2xl p-6">

                                <p
                                    class="text-slate-500">

                                    Nomor Virtual Account

                                </p>

                                <h2
                                    class="text-4xl font-bold mt-2">

                                    8800880012345678

                                </h2>

                            </div>

                            <div
                                class="flex gap-3 mt-6">

                                <button
                                    type="button"
                                    onclick="copyText('8800880012345678')"
                                    class="bg-slate-900 text-white px-5 py-3 rounded-xl">

                                    Salin VA

                                </button>

                                <button
                                    type="button"
                                    onclick="selectMethod('VIRTUAL_ACCOUNT')"
                                    class="bg-yellow-500 text-white px-5 py-3 rounded-xl">

                                    Pilih VA

                                </button>

                            </div>

                        </div>

                    </div>

                </div>
                {{-- UPLOAD BUKTI PEMBAYARAN --}}
                <div class="bg-white rounded-3xl shadow-sm p-8">

                    <h2 class="text-2xl font-bold text-slate-900 mb-6">
                        Upload Bukti Pembayaran
                    </h2>

                    <label
                        class="border-2 border-dashed border-slate-300 hover:border-yellow-500 transition rounded-3xl p-10 flex flex-col items-center justify-center cursor-pointer">

                        <div class="text-6xl mb-4">
                            📷
                        </div>

                        <h3 class="font-semibold text-lg">
                            Klik untuk upload bukti pembayaran
                        </h3>

                        <p class="text-slate-500 mt-2 text-sm">
                            JPG, JPEG, PNG maksimal 2MB
                        </p>

                        <input
                            type="file"
                            id="proof_image"
                            name="proof_image"
                            accept=".jpg,.jpeg,.png"
                            class="hidden">

                    </label>

                    {{-- PREVIEW --}}
                    <div class="mt-6">

                        <img
                            id="preview"
                            class="hidden w-80 rounded-2xl shadow border">

                    </div>

                    @error('proof_image')

                        <p class="text-red-500 mt-3">
                            {{ $message }}
                        </p>

                    @enderror

                    <button
                        type="submit"
                        class="mt-8 w-full bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-4 rounded-2xl transition">

                         Upload Bukti Pembayaran

                    </button>

                </div>

            </form>

        </div>


        {{-- KANAN --}}
        <div>

            <div
                class="bg-white rounded-3xl shadow-sm p-8 sticky top-8">

                <h2
                    class="text-2xl font-bold text-slate-900 mb-6">

                    Ringkasan Pesanan

                </h2>

                <div class="space-y-4">

                    <div class="flex justify-between">

                        <span class="text-slate-500">
                            Paket
                        </span>

                        <span class="font-semibold text-right">
                            {{ $booking->paket->nama_paket }}
                        </span>

                    </div>

                    <div class="flex justify-between">

                        <span class="text-slate-500">
                            Peserta
                        </span>

                        <span class="font-semibold">
                            {{ $booking->participants }}
                            Orang
                        </span>

                    </div>

                    <div class="flex justify-between">

                        <span class="text-slate-500">
                            Keberangkatan
                        </span>

                        <span class="font-semibold">

                            {{ optional($booking->departure_date)->format('d M Y') }}

                        </span>

                    </div>

                    <div class="flex justify-between">

                        <span class="text-slate-500">
                            Status
                        </span>

                        <span
                            class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-xl text-sm">

                            Menunggu Pembayaran

                        </span>

                    </div>

                </div>

                <hr class="my-6">

                <div class="space-y-4">

                    <div class="flex justify-between">

                        <span class="text-slate-500">
                            Subtotal
                        </span>

                        <span>

                            Rp
                            {{ number_format($booking->total_price,0,',','.') }}

                        </span>

                    </div>

                    <div class="flex justify-between">

                        <span class="text-slate-500">
                            Biaya Admin
                        </span>

                        <span>

                            Rp 5.000

                        </span>

                    </div>

                </div>

                <hr class="my-6">

                <div class="flex justify-between items-center">

                    <span
                        class="text-xl font-bold">

                        Total Bayar

                    </span>

                    <span
                        class="text-3xl font-bold text-yellow-500">

                        Rp
                        {{ number_format($booking->total_price + 5000,0,',','.') }}

                    </span>

                </div>

                <div
                    class="mt-6 bg-slate-50 rounded-2xl p-5">

                    <h4
                        class="font-bold mb-3">

                        Instruksi Pembayaran

                    </h4>

                    <ul
                        class="space-y-2 text-sm text-slate-600">

                        <li>• Pilih metode pembayaran.</li>
                        <li>• Transfer sesuai total tagihan.</li>
                        <li>• Upload bukti pembayaran.</li>
                        <li>• Tunggu verifikasi admin.</li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

</div>


<script>

function showTab(tab)
{
    document
        .querySelectorAll('.payment-tab')
        .forEach(el => el.classList.add('hidden'));

    document
        .getElementById(tab + '-tab')
        .classList.remove('hidden');
}

function selectMethod(method)
{
    document
        .getElementById('payment_method')
        .value = method;

    document
        .getElementById('selectedMethod')
        .innerHTML = method;
}

function copyText(text)
{
    navigator.clipboard.writeText(text);

    alert('Berhasil disalin');
}

let time = 86400;

setInterval(() => {

    let h = Math.floor(time / 3600);
    let m = Math.floor((time % 3600) / 60);
    let s = time % 60;

    document.getElementById('countdown').innerHTML =
        String(h).padStart(2,'0')
        + ':'
        + String(m).padStart(2,'0')
        + ':'
        + String(s).padStart(2,'0');

    if(time > 0)
    {
        time--;
    }

},1000);

document
.getElementById('proof_image')
.addEventListener('change', function(e){

    const file = e.target.files[0];

    if(!file) return;

    const reader = new FileReader();

    reader.onload = function(ev){

        const preview =
            document.getElementById('preview');

        preview.src = ev.target.result;

        preview.classList.remove('hidden');
    };

    reader.readAsDataURL(file);

});

</script>

</x-layouts.customer>