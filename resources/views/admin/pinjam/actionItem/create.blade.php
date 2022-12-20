<x-app-layout>
    <div class="m-10 bg-white p-10 rounded-lg">
        <span class="font-bold text-4xl">Item Distribusi</span>

        @php
            $idKota = Auth::user()->id_kota;
        @endphp
        <div class="mt-10">
            <div class="block overflow-x-auto p-8 text-dark">
                <form method="POST" action="/adminpinjamItem" enctype="multipart/form-data">
                    @csrf
                    <input hidden name="idPinjam" value="{{$idPinjam}}"
                    placeholder="">
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Jenis
                            Peralatan</label>
                        <select id="id_barang" name="id_peralatan"
                            class="bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option selected>Pilih Peralatan</option>
                            @foreach ($peralatans as $logistik)
                                <option value="{{ $logistik->id }}">{{ $logistik->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="jumlah" class="block mb-2 text-sm font-medium text-gray-900">Jumlah</label>
                        <input type="number" id="jumlah" name="jumlah"
                            class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                            placeholder="" required>
                    </div>
                    <button type="submit"
                        class="text-white bg-blue hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
