<x-app-layout>
    <div class="m-10 bg-white p-10 rounded-lg">
        <span class="font-bold text-4xl">Tambah Peralatan</span>

        <div class="mt-10">
            <div class="block overflow-x-auto p-8 text-dark">
                <form method="POST" action="{{ route('peralatan.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                        <input type="text" id="nama" name="nama"
                            class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                            placeholder="" required>
                    </div>
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">
                            Kategori Peralatan
                        </label>
                        <select id="jenis_peralatan" name="kategori"
                            class="bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option selected>Pilih Kategori Peralatan</option>
                            @foreach ($kategories as $kategori)
                                <option value="{{$kategori->nama_kategori}}">{{$kategori->nama_kategori}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="jumlah" class="block mb-2 text-sm font-medium text-gray-900">Jumlah</label>
                        <input type="number" id="jumlah" name="jumlah"
                            class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                            placeholder="" required>
                    </div>



                    <div class="mb-6">
                        <label for="kondisi" class="block mb-2 text-sm font-medium text-gray-900">
                           Kondisi
                        </label>
                        <div class="flex flex-row gap-4">
                            <div>
                                <label for="kondisi" class="block mb-2 text-sm font-medium text-gray-900">
                                    Baik
                                 </label>
                                <input type="number" id="" name="baik" value="0"
                                class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                                placeholder="" required>
                            </div>
                            <div>
                                <label for="kondisi" class="block mb-2 text-sm font-medium text-gray-900">
                                    Rusak Ringan
                                 </label>
                                <input type="number" id="" name="rusak_ringan" value="0"
                                class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                                placeholder="" required>
                            </div>
                            <div>
                                <label for="kondisi" class="block mb-2 text-sm font-medium text-gray-900">
                                    Rusak Sedang
                                 </label>
                                <input type="number" id="" name="rusak_sedang" value="0"
                                class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                                placeholder="" required>
                            </div>
                            <div>
                                <label for="kondisi" class="block mb-2 text-sm font-medium text-gray-900">
                                    Rusak Berat
                                 </label>
                                <input type="number" id="" name="rusak_berat" value="0"
                                class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                                placeholder="" required>
                            </div>
                        </div>
               
                    </div>

                    <div class="mb-6">
                        <label for="filefoto" class="block mb-2 text-sm font-medium text-gray-900">Foto</label>
                        <input type="file" id="filefoto" name="filefoto"
                            class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                            placeholder="" >
                    </div>

                    <div class="mb-6">
                        <label for="tahun" class="block mb-2 text-sm font-medium text-gray-900">
                            Tahun Perolehan BNPB
                        </label>
                        <input type="date" id="tahun" name="tahun"
                            class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                            placeholder="" required>
                    </div>
                    <div class="mb-6">
                        <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900">Sumber Dana</label>
                        <textarea type="text" id="sumber_dana_peralatan" name="sumber_dana_peralatan"
                            class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                            placeholder="" required></textarea>
                    </div>
                    <div class="mb-6">
                        <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900">Keterangan</label>
                        <textarea type="text" id="keterangan" name="keterangan"
                            class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                            placeholder="" required></textarea>
                    </div>
                    <button type="submit"
                        class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
