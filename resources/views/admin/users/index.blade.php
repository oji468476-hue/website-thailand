<x-layouts.admin>

<div class="max-w-7xl mx-auto">

<div class="flex justify-between items-center mb-8">

    <div>

        <h1 class="text-4xl font-bold text-slate-900">
            Kelola User
        </h1>

        <p class="text-slate-500 mt-2">
            Manajemen akun customer, mitra, admin, dan owner.
        </p>

    </div>

    <a
        href="{{ route('admin.users.create') }}"
        class="bg-[#071739] hover:bg-[#0d285f] text-white px-6 py-3 rounded-2xl font-semibold">

        + Tambah User

    </a>

</div>

@if(session('success'))

    <div class="mb-6 bg-green-100 border border-green-300 text-green-700 px-5 py-4 rounded-2xl">

        {{ session('success') }}

    </div>

@endif

<div class="bg-white rounded-3xl shadow-sm overflow-hidden">

    <table class="w-full">

        <thead class="bg-slate-50">

            <tr>

                <th class="text-left px-6 py-5">Nama</th>
                <th class="text-left px-6 py-5">Email</th>
                <th class="text-left px-6 py-5">Role</th>
                <th class="text-center px-6 py-5">Aksi</th>

            </tr>

        </thead>

        <tbody>

            @foreach($users as $user)

            <tr class="border-t hover:bg-slate-50">

                <td class="px-6 py-5 font-semibold">
                    {{ $user->nama }}
                </td>

                <td class="px-6 py-5 text-slate-600">
                    {{ $user->email }}
                </td>

                <td class="px-6 py-5">

                    @if($user->role == 'admin')

                        <span class="bg-red-100 text-red-700 px-4 py-2 rounded-full text-sm">
                            Admin
                        </span>

                    @elseif($user->role == 'owner')

                        <span class="bg-yellow-100 text-yellow-700 px-4 py-2 rounded-full text-sm">
                            Owner
                        </span>

                    @elseif($user->role == 'mitra')

                        <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full text-sm">
                            Mitra
                        </span>

                    @else

                        <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm">
                            Customer
                        </span>

                    @endif

                </td>

                <td class="px-6 py-5">

                    <div class="flex justify-center gap-3">

                        <a
                            href="{{ route('admin.users.edit', $user) }}"
                            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-xl">

                            Edit

                        </a>

                        <form
                            action="{{ route('admin.users.destroy', $user) }}"
                            method="POST"
                            class="deleteForm">

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl">

                                Hapus

                            </button>

                        </form>

                    </div>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

document.querySelectorAll('.deleteForm')
.forEach(form => {

    form.addEventListener('submit', function(e){

        e.preventDefault();

        Swal.fire({

            title: 'Hapus User',

            text: 'User akan dihapus permanen.',

            icon: 'warning',

            showCancelButton: true,

            confirmButtonColor: '#ef4444',

            confirmButtonText: 'Ya, Hapus',

            cancelButtonText: 'Batal'

        }).then((result)=>{

            if(result.isConfirmed)
            {
                form.submit();
            }

        });

    });

});

</script>

</x-layouts.admin>
