<x-app-layout>
    <div class="m-10 bg-white p-10 rounded-lg">
        <span class="font-bold text-4xl">Detail Logistik</span>

        <div class="mt-10">
            <div class="block overflow-x-auto p-8 text-dark">


                <input hidden type="text" name="id" disabled value="{{ $logistik->id }}">

                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                    <input type="text" disabled id="nama" name="nama" value="{{ $logistik->nama_logistik }}"
                        class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                        placeholder="{{ $logistik->nama_logistik }}" required>
                </div>
                <div class="mb-6">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Kategori</label>
                    <input type="text" disabled id="nama" name="nama" value="{{ $logistik->kategori_logistik }}"
                        class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                         required>
                </div>
                <div class="mb-6">
                    <label for="jumlah" class="block mb-2 text-sm font-medium text-gray-900">Jumlah</label>
                    <input type="number" disabled id="jumlah" name="jumlah"
                        value="{{ $logistik->jumlah_logistik }}"
                        class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                        placeholder="{{ $logistik->jumlah_logistik }}" required>
                </div>


                <div class="mb-6">
                    <label for="filefoto" class="block mb-2 text-sm font-medium text-gray-900">Foto</label>
                    @if ($logistik->foto != null)
                        <img src="{{ $logistik->foto_logistik }}" class="w-64 h-64 rounded mb-2" />
                    @endif
                </div>

                <div class="mb-6">
                    <label for="tahun" class="block mb-2 text-sm font-medium text-gray-900">Tahun</label>
                    <input type="date" disabled id="tahun" name="tahun" value="{{ $logistik->tahun_logistik }}"
                        class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                        placeholder="{{ $logistik->tahun_logistik }}" required>
                </div>

                <div class="mb-6">
                    <label for="keterangan" class="block mb-2 text-sm font-medium text-gray-900">Keterangan</label>
                    <textarea type="text" disabled id="keterangan" name="keterangan" value="{{ $logistik->keterangan_logistik }}"
                        class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                        placeholder="" required>{{ $logistik->keterangan_logistik }}</textarea>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
