<x-app-layout>
    <div class="m-10 bg-white p-10 rounded-lg">
        <span class="font-bold text-4xl">Edit Logistik</span>

        @php
            $idKota = Auth::user()->id_kota;
        @endphp
        <div class="mt-10">
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
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Jenis
                            Logistik</label>
                        <select id="kategori_logistik" name="kategori_logistik"
                            class="bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option selected>Pilih Jenis Logistik</option>
                            @foreach ($kategories as $kategori)
                                <option value="{{ $kategori->nama_kategoril }}">{{ $kategori->nama_kategoril }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="jumlah" class="block mb-2 text-sm font-medium text-gray-900">Jumlah</label>
                        <input type="number" id="jumlah_logistik" name="jumlah_logistik"
                            class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                            placeholder="" required>
                    </div>
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Satuan
                            Logistik</label>
                        <select id="satuan_logistik" name="satuan_logistik"
                            class="bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option selected>Pilih Satuan Logistik</option>
                            <option value="Pcs">Pcs</option>
                            <option value="Lusin">Lusin</option>
                            <option value="Box">Box</option>
                            <option value="Karung">Karung</option>
                            <option value="Kg">Kg</option>
                            <option value="Gram">Gram</option>
                            <option value="Liter">Liter</option>
                            <option value="Set">Set</option>
                        </select>
                    </div>

                    <div class="mb-6">
                        <label for="fotologistik" class="block mb-2 text-sm font-medium text-gray-900">Foto</label>
                        <input type="file" id="fotologistik" name="fotologistik"
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
                        <label for="tahun" class="block mb-2 text-sm font-medium text-gray-900">Tanggal
                            Expired</label>
                        <input type="date" id="tahunexp_logistik" name="tahunexp_logistik"
                            class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                            placeholder="" required>
                    </div>

                    <div class="mb-6">
                        <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900">Sumber Dana</label>
                        <textarea type="text" id="sumber_dana_logistik" name="sumber_dana_logistik"
                            class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                            placeholder="" required></textarea>
                    </div>
                    <div class="mb-6">
                        <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900">Keterangan</label>
                        <textarea type="text" id="keterangan_logistik" name="keterangan_logistik"
                            class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                            placeholder="" required></textarea>
                    </div>
                    <button type="submit"
                        class="text-white hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-blue-600 ">Submit</button>

                </form>
            </div>

        </div>
    </div>
</x-app-layout>
