<x-app-layout>
    <div class="m-10 bg-white p-10 rounded-lg">
        <span class="font-bold text-4xl">Distribusi Logistik</span>

        @php
            $idKota = Auth::user()->id_kota;
        @endphp


        <div class="flex flex-row gap-2 mt-10 ml-10">

            <table class="w-screen">
                <thead class="border-b bg-primaryColor rounded-lg text-white">
                    <tr>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            #
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            Nama Logistik
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            Kategori Logistik
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

                <div class="mb-6">
                    <input type="hidden" name="id" value="{{ $distribusi->id }}">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Kota Penerima</label>
                    <input type="text" disabled id="jumlah" name="jumlah"
                        value="{{ $distribusi->kota_penerima }}"
                        class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                        placeholder="{{ $distribusi->kota_penerima }}" required>
                </div>


                <div class="mb-6">
                    <label for="filefoto" class="block mb-2 text-sm font-medium text-gray-900">Foto/File Surat</label>
                    @if ($distribusi->file != null)
                        <img src="{{ $distribusi->file }}" class="w-64 h-64 rounded mb-2" />
                    @endif
                </div>

                <div class="mb-6">
                    <label for="tanggal_distribusi" class="block mb-2 text-sm font-medium text-gray-900">Tanggal</label>
                    <input type="date" id="tanggal_distribusi" name="tanggal_distribusi"
                        value="{{ $distribusi->tanggal_distribusi }}"
                        class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                        placeholder="" required>
                </div>

                <div class="mb-6">
                    <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900">Keterangan</label>
                    <textarea type="text" id="keterangan_distribusi" name="keterangan_distribusi" value=""
                        class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                        placeholder="" required> {{ $distribusi->keterangan_distribusi }}</textarea>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
