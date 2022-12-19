<x-app-layout>
    <div class="m-10 bg-white p-10 rounded-lg">
        <span class="font-bold text-4xl">Distribusi Logistik</span>

        @php
            $idKota = Auth::user()->id_kota;
        @endphp


        <div class="flex flex-row gap-2 mt-10 ml-10">

            <a href="{{ route('distribusiItem.createView', $distribusi->id) }}"
                class="text-lg  bg-blue-600 text-white rounded-2xl h-fit">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>

            </a>
            <table class="w-screen">
                <thead class="border-b bg-primaryColor rounded-lg text-white">
                    <tr>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            #
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            Nama
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            Kategori
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            Foto
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            Jumlah
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            Aksi
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($distribusi->distribusiItem as $item)
                        <tr class="border-b ">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $loop->iteration }}
                            </td>

                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $item->logistik->nama_logistik }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $item->logistik->kategori_logistik }}
                            </td>
                            <td
                            class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                            <img src="{{$item->logistik->foto_logistik}}" class="w-20 h-20" />
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $item->jumlah }}
                            </td>
                            <td>
                                {{-- <form action="{{ route('kategori.delete', $item->id) }}"
                                method="POST">
                                @csrf
                                <button type="submit">
                                    <svg class="w-10 h-10 bg-pinkColor p-2 rounded text-white"
                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>

                                </button>
                            </form> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

        <div class="mt-5">
            <div class="block overflow-x-auto p-8 text-dark">
                <form method="POST" action="/adminlogistik" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-6">
                        <input type="hidden" name="id_kota" value="{{ $idKota }}">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                        <input type="text" id="nama_logistik" name="nama_logistik"
                            class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                            placeholder="" required>
                    </div>
                    <div class="mb-6">
                        <label for="jumlah" class="block mb-2 text-sm font-medium text-gray-900">Jumlah</label>
                        <input type="number" id="jumlah_logistik" name="jumlah_logistik"
                            class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                            placeholder="" required>
                    </div>


                    <div class="mb-6">
                        <label for="filefoto" class="block mb-2 text-sm font-medium text-gray-900">Foto</label>
                        <input type="file" id="filefoto" name="filefoto"
                            class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                            placeholder="">
                    </div>

                    <div class="mb-6">
                        <label for="tahun" class="block mb-2 text-sm font-medium text-gray-900">Tahun</label>
                        <input type="date" id="tahun_logistik" name="tahun_logistik"
                            class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                            placeholder="" required>
                    </div>

                    <div class="mb-6">
                        <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900">Keterangan</label>
                        <textarea type="text" id="keterangan_logistik" name="keterangan_logistik"
                            class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                            placeholder="" required></textarea>
                    </div>
                    <button type="submit"
                        class="text-white bg-blue hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
