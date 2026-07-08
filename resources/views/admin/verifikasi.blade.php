<x-layouts.admin>

<div class="max-w-7xl mx-auto">

    <div class="mb-8">

        <h2 class="text-4xl font-bold text-slate-900">
            Verifikasi Pembayaran
        </h2>

        <p class="text-slate-500 mt-2">
            Kelola dan verifikasi pembayaran customer.
        </p>

    </div>

    @if(session('success'))

        <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-2xl">

            {{ session('success') }}

        </div>

    @endif

    @if($pembayarans->count())

        <div class="grid gap-6">

            @foreach($pembayarans as $p)

            <div class="bg-white rounded-3xl shadow-sm border border-slate-200 p-6">

                <div class="grid lg:grid-cols-4 gap-6">

                    {{-- BUKTI TF --}}
                    <div>

                        <a
                            href="{{ asset('storage/' . $p->proof_image) }}"
                            target="_blank">

                            <img
                                src="{{ asset('storage/' . $p->proof_image) }}"
                                class="w-full h-56 object-cover rounded-2xl border border-slate-200">

                        </a>

                    </div>

                    {{-- DETAIL --}}
                    <div class="lg:col-span-2">

                        <div class="space-y-4">

                            <div>

                                <p class="text-slate-500 text-sm">
                                    Customer
                                </p>

                                <h3 class="font-bold text-lg text-slate-900">
                                    {{ $p->booking->user->nama }}
                                </h3>

                            </div>

                            <div>

                                <p class="text-slate-500 text-sm">
                                    Paket Wisata
                                </p>

                                <h3 class="font-semibold">
                                    {{ $p->booking->paket->nama_paket }}
                                </h3>

                            </div>

                            <div class="grid grid-cols-2 gap-4">

                                <div>

                                    <p class="text-slate-500 text-sm">
                                        Peserta
                                    </p>

                                    <h3 class="font-semibold">
                                        {{ $p->booking->participants }} Orang
                                    </h3>

                                </div>

                                <div>

                                    <p class="text-slate-500 text-sm">
                                        Booking ID
                                    </p>

                                    <h3 class="font-semibold">
                                        #{{ $p->booking->id }}
                                    </h3>

                                </div>

                            </div>

                            <div>

                                <p class="text-slate-500 text-sm">
                                    Tanggal Keberangkatan
                                </p>

                                <h3 class="font-semibold">

                                    {{ \Carbon\Carbon::parse($p->booking->departure_date)->format('d F Y') }}

                                </h3>

                            </div>

                            <div>

                                <p class="text-slate-500 text-sm">
                                    Total Pembayaran
                                </p>

                                <h3 class="text-2xl font-bold text-yellow-600">

                                    Rp {{ number_format($p->booking->total_price,0,',','.') }}

                                </h3>

                            </div>

                        </div>

                    </div>

                    {{-- AKSI --}}
                    <div class="flex flex-col justify-center gap-3">

                        <form
                            class="verifyForm"
                            action="{{ route('admin.verifikasi.verify', $p->id) }}"
                            method="POST">

                            @csrf

                            <button
                                type="submit"
                                class="w-full bg-green-500 hover:bg-green-600 text-white py-3 rounded-xl font-semibold transition">

                                Verifikasi Pembayaran

                            </button>

                        </form>

                        <form
                            class="rejectForm"
                            action="{{ route('admin.verifikasi.tolak', $p->id) }}"
                            method="POST">

                            @csrf

                            <button
                                type="submit"
                                class="w-full bg-red-500 hover:bg-red-600 text-white py-3 rounded-xl font-semibold transition">

                                Tolak Pembayaran

                            </button>

                        </form>

                    </div>

                </div>

            </div>

            @endforeach

        </div>

    @else

        <div class="bg-white rounded-3xl shadow-sm p-16 text-center">

            <div class="text-6xl mb-4">
                ✓
            </div>

            <h3 class="text-2xl font-bold text-slate-800">
                Tidak Ada Pembayaran Pending
            </h3>

            <p class="text-slate-500 mt-2">
                Semua pembayaran telah diproses.
            </p>

        </div>

    @endif

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

document.querySelectorAll('.verifyForm')
.forEach(form => {

    form.addEventListener('submit', function(e){

        e.preventDefault();

        Swal.fire({

            title: 'Verifikasi Pembayaran',

            text: 'Apakah Anda yakin ingin memverifikasi pembayaran ini?',

            icon: 'question',

            showCancelButton: true,

            confirmButtonColor: '#22c55e',

            cancelButtonColor: '#64748b',

            confirmButtonText: 'Ya, Verifikasi',

            cancelButtonText: 'Batal'

        }).then((result) => {

            if(result.isConfirmed)
            {
                form.submit();
            }

        });

    });

});

document.querySelectorAll('.rejectForm')
.forEach(form => {

    form.addEventListener('submit', function(e){

        e.preventDefault();

        Swal.fire({

            title: 'Tolak Pembayaran',

            text: 'Apakah Anda yakin ingin menolak pembayaran ini?',

            icon: 'warning',

            showCancelButton: true,

            confirmButtonColor: '#ef4444',

            cancelButtonColor: '#64748b',

            confirmButtonText: 'Ya, Tolak',

            cancelButtonText: 'Batal'

        }).then((result) => {

            if(result.isConfirmed)
            {
                form.submit();
            }

        });

    });

});

</script>

</x-layouts.admin>