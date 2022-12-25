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
                            Asal Kota/Kab
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            Foto
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            Jumlah
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            Satuan
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
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $item->logistik->kota->nama_kota }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                <img src="{{ $item->logistik->foto_logistik }}" class="w-20 h-20" />
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $item->jumlah }}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $item->logistik->satuan_logistik }}
                            </td>

                            <td class="px-6 py-4">
                                {{-- Role Action --}}
                                @if ($item->status == 0)
                                    <form action="{{ route('distribusi.addToVerif', $item->id) }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <input type="hidden" name="id_logistik" value="{{ $item->id_logistik }}">
                                        <button
                                            onclick="return confirm('Aksi ini akan mengurangi stok logistik di gudang asal') "
                                            class="bg-green-400 p-1 rounded-md hover:shadow-xl hover:bg-green-500 font-bold">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M4.5 12.75l6 6 9-13.5" />
                                            </svg>

                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('distribusi.delToVerif', $item->id) }}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <input type="hidden" name="id_logistik" value="{{ $item->id_logistik }}">

                                        <button
                                            onclick="return confirm('Aksi ini akan menambah stok logistik di gudang asal') "
                                            class="bg-yellow-300 p-1 rounded-md hover:shadow-xl hover:bg-yellow-400 font-bold">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>

                                        </button>
                                    </form>
                                @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

        <div class="mt-5">
            <div class="block overflow-x-auto p-8 text-dark">
                <form method="post" action="/admindistribusiDraftView/{{ $distribusi->id }}"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="mb-6">
                        <input type="hidden" name="id" value="{{ $distribusi->id }}">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Kota Peminta</label>
                        <select
                            class="form-select bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                            name="kota_penerima">
                            @foreach ($kotas as $kota)
                                <option value="{{ $kota->nama_kota }}">
                                    {{ $kota->nama_kota }}
                                </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="mb-6">
                        <input type="hidden" value="{{ $distribusi->file }}" name="file">
                        <label for="filefoto" class="block mb-2 text-sm font-medium text-gray-900">Foto</label>
                        <input type="file" id="file" name="file"
                            class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                            placeholder="">
                    </div>

                    <div class="mb-6">
                        <label for="tanggal_distribusi"
                            class="block mb-2 text-sm font-medium text-gray-900">Tanggal</label>
                        <input type="date" id="tanggal_distribusi" name="tanggal_distribusi"
                            value="{{ $distribusi->tanggal_distribusi }}"
                            class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                            placeholder="" required>
                    </div>

                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Status</label>
                        <select
                            class="form-select bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                            name="status">
                            <option value="draft">
                                Draft
                            </option>
                            <option value="Sedang Digunakan">
                                Sedang Digunakan
                            </option>
                            <option value="Selesai">
                                Selesai
                            </option>
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="keterangan"
                            class="block mb-2 text-sm font-medium text-gray-900">Keterangan</label>
                        <textarea type="text" id="keterangan_distribusi" name="keterangan_distribusi"
                            value="{{ $distribusi->keterangan_distribusi }}"
                            class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                            placeholder="" required> {{ $distribusi->keterangan_distribusi }}</textarea>
                    </div>
                    <button type="submit"
                        class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
