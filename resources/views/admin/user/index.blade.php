<x-app-layout>
    <div class="m-10 bg-white p-10 rounded-lg">
        <span class="font-bold text-4xl">Veifikasi Akun</span>

        <div class="mt-10">

            <div class="overflow-x-auto relative mt-5">
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full">
                                    <thead class="border-b bg-primaryColor rounded-lg text-white">
                                        <tr>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                #
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Nama
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                NIP
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Email
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Kota / Kab
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Status
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $logistik)
                                            <tr class="border-b-2 ">
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $logistik->name }}
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $logistik->nip }}
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $logistik->email }}
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $logistik->kota->nama_kota }}
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    @if ($logistik->status == 1)
                                                        Terverfikasi
                                                    @else
                                                        Pending
                                                    @endif
                                                </td>

                                                <td class="flex flex-row gap-1 p-4 align-items: center">
                                                    {{-- Role Action --}}
                                                    @if ($logistik->status == 0)
                                                        <form action="{{ route('user.addToVerif', $logistik->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('POST')
                                                            <button
                                                                class="bg-green-400 p-1 rounded-md hover:shadow-xl hover:bg-green-500">
                                                                <span class="text-sm">+Verifikasi </span>

                                                            </button>
                                                        </form>
                                                    @else
                                                        <form action="{{ route('user.delToVerif', $logistik->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('POST')
                                                            <button
                                                                class="bg-yellow-300 p-1 rounded-md hover:shadow-xl hover:bg-yellow-400">
                                                                <span class="text-sm">-Verifikasi </span>
                                                            </button>
                                                        </form>
                                                    @endif

                                                    {{-- Hapus User --}}
                                                    <form action="{{ route('user.delUser', $logistik->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('POST')
                                                        <button class="bg-red-500 p-1 rounded-md hover:shadow-xl"
                                                            onclick="return confirm('Apakah Kamu Yakin Ingin Menghapus?') ">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="w-6 h-6 text-white">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                            </svg>

                                                        </button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
