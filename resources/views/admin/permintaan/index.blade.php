<x-app-layout>
    <div class="m-10 bg-white p-10 rounded-lg">
        <span class="font-bold text-4xl">Permintaan Barang</span>

        <div class="mt-10">

            <div class="overflow-x-auto relative mt-5">
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table id="data_table" class="min-w-full">
                                    <thead class="border-b bg-primaryColor rounded-lg text-white">
                                        <tr>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                #
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Nama Pengguna
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Kota/Kab.
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Kecamatan
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Keluarahan
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Alamat
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Jenis Bencana
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permintaans as $item)
                                            <tr class="border-b ">
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $item->user->name }}
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $item->kabupaten }}
                                                </td>

                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $item->kecamatan }}
                                                </td>

                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $item->kelurahan }}
                                                </td>

                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $item->alamat }}
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                    {{ $item->jenis_bencana }}
                                                </td>
                                                <td
                                                    class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap flex gap-2">
                                                    <a href="permintaan/{{ $item->id }}">
                                                        <svg class="w-10 h-10 bg-greenColor p-2 rounded text-white"
                                                            xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5"
                                                            stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m5.231 13.481L15 17.25m-4.5-15H5.625c-.621 0-1.125.504-1.125 1.125v16.5c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9zm3.75 11.625a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                                                        </svg>

                                                    </a>
                                                    <form action="peralatan/{{ $item->id }}" method="post">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit"
                                                            onclick="return confirm('Apakah Kamu Yakin Ingin Menghapus?') ">
                                                            <svg class="w-10 h-10 bg-pinkColor p-2 rounded text-white"
                                                                xmlns="http://www.w3.org/2000/svg" fill="none"
                                                                viewBox="0 0 24 24" stroke-width="1.5"
                                                                stroke="currentColor" class="w-6 h-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                            </svg>

                                                        </button>
                                                    </form>

                                                </td>
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
