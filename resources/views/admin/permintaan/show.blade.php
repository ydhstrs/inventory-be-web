<x-app-layout>
    <div class="m-10 bg-white p-10 rounded-lg">
        <span class="font-bold text-4xl">Detail Permintaan Barang</span>

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
                            Nama Barang
                        </th>
                        <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                            Jumlah
                        </th>


                    </tr>
                </thead>
                <tbody>
                    @foreach ($permintaan->permintaanBarang as $item)
                        <tr class="border-b ">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $loop->iteration }}
                            </td>

                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $item->nama_permintaan_barang}}
                            </td>
                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                {{ $item->jumlah_permintaan_barang }}
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

        <div class="mt-5">
            <div class="block overflow-x-auto p-8 text-dark">
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama Pengguna</label>
                    <input type="text" disabled id="jumlah" name="jumlah" value="{{ $permintaan->user->name }}"
                        class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                        required>
                </div>

                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Kota</label>
                    <input type="text" disabled id="jumlah" name="jumlah" value="{{ $permintaan->kabupaten }}"
                        class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                        required>
                </div>
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Kecamatan</label>
                    <input type="text" disabled id="jumlah" name="jumlah" value="{{ $permintaan->kecamatan }}"
                        class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                        required>
                </div>
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Kelurahan</label>
                    <input type="text" disabled id="jumlah" name="jumlah" value="{{ $permintaan->kelurahan }}"
                        class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                        required>
                </div>
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Jenis Bencana</label>
                    <input type="text" disabled id="jumlah" name="jumlah" value="{{ $permintaan->jenis_bencana }}"
                        class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                        required>
                </div>

                <div class="mb-6">
                    <label for="tanggal_distribusi" class="block mb-2 text-sm font-medium text-gray-900">Tanggal</label>
                    <input type="datetime" id="tanggal_distribusi" name="tanggal_distribusi"
                        value="{{ $permintaan->created_at }}"
                        class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                        placeholder="" required>
                </div>


            </div>

        </div>
    </div>
</x-app-layout>
