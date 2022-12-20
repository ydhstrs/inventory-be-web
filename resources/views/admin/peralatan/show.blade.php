<x-app-layout>
    <div class="m-10 bg-white p-10 rounded-lg">
        <span class="font-bold text-4xl">Detail Peralatan</span>

        <div class="mt-10">
            <div class="block overflow-x-auto p-8 text-dark">


                <input hidden type="text" name="id" disabled value="{{ $peralatan->id }}">

                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                    <input type="text" disabled id="nama" name="nama" value="{{ $peralatan->nama }}"
                        class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                        placeholder="{{ $peralatan->nama }}" required>
                </div>
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Kategori
                        Peralatan</label>
                    <input type="text" disabled id="nama" name="nama" value="{{ $peralatan->kategori }}"
                        class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                        placeholder="{{ $peralatan->kategori }}" required>
                </div>
                <div class="mb-6">
                    <label for="jumlah" class="block mb-2 text-sm font-medium text-gray-900">Jumlah</label>
                    <input type="number" disabled id="jumlah" name="jumlah" value="{{ $peralatan->jumlah }}"
                        class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                        placeholder="{{ $peralatan->jumlah }}" required>
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
                            <input type="number" id="" name="baik"
                                value=" {{ $peralatan->kondisiBarang->baik }}" disabled
                                class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                                placeholder=" {{ $peralatan->kondisiBarang->baik }}" required>
                        </div>
                        <div>
                            <label for="kondisi" class="block mb-2 text-sm font-medium text-gray-900">
                                Rusak Ringan
                            </label>
                            <input type="number" id="" name="rusak_ringan"
                                value=" {{ $peralatan->kondisiBarang->rusak_ringan }}" disabled
                                class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                                placeholder=" {{ $peralatan->kondisiBarang->rusak_ringan }}" required>
                        </div>
                        <div>
                            <label for="kondisi" class="block mb-2 text-sm font-medium text-gray-900">
                                Rusak Sedang
                            </label>
                            <input type="number" id="" name="rusak_sedang" value=" {{$peralatan->kondisiBarang->rusak_sedang}}" disabled
                                class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                                placeholder=" {{$peralatan->kondisiBarang->rusak_sedang}}" required>
                        </div>
                        <div>
                            <label for="kondisi" class="block mb-2 text-sm font-medium text-gray-900">
                                Rusak Berat
                            </label>
                            <input type="number" id="" name="rusak_berat" value=" {{$peralatan->kondisiBarang->rusak_berat}}" disabled
                                class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                                placeholder=" {{$peralatan->kondisiBarang->rusak_berat}}" required>
                        </div>
                    </div>

                </div>


                <div class="mb-6">
                    <label for="filefoto" class="block mb-2 text-sm font-medium text-gray-900">Foto</label>
                    @if ($peralatan->foto != null)
                        <img src="{{ $peralatan->foto }}" class="w-64 h-64 rounded mb-2" />
                    @endif
                </div>

                <div class="mb-6">
                    <label for="tahun" class="block mb-2 text-sm font-medium text-gray-900">Tahun Perolehan BNPB</label>
                    <input type="date" disabled id="tahun" name="tahun" value="{{ $peralatan->tahun }}"
                        class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                        placeholder="{{ $peralatan->tahun }}" required>
                </div>

                <div class="mb-6">
                    <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900">Sumber Dana</label>
                    <textarea type="text" disabled id="keterangan" name="keterangan" value="{{ $peralatan->sumber_dana_peralatan }}"
                        class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                        placeholder="" required>{{ $peralatan->sumber_dana_peralatan }}</textarea>
                </div>

                <div class="mb-6">
                    <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900">Keterangan</label>
                    <textarea type="text" disabled id="keterangan" name="keterangan" value="{{ $peralatan->keterangan }}"
                        class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                        placeholder="" required>{{ $peralatan->keterangan }}</textarea>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
