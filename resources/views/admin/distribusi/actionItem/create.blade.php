<x-app-layout>
    <div class="m-10 bg-white p-10 rounded-lg">
        <span class="font-bold text-4xl">Item Distribusi</span>

        @php
            $idKota = Auth::user()->id_kota;
        @endphp
        <div class="mt-8">
            <form method="GET" action="{{ $idDistribusi }}">
                <div class="flex items-center">
                    <div class="relative pl-3">
                        <select name="id_kota" class="bg-white border border-gray-300 text-gray-900 w-full rounded-md">
                            <option value=""> Pilih Kota/Kab Pemberi </option>
                            @foreach ($kotas as $kota)
                                <option value="{{ $kota->id }}" @if ($kota->id == old('id_user')) selected @endif>
                                    {{ $kota->nama_kota }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit"
                        class="bg-blue-900 text-white py-2 px-6 mx-4 hover:opacity-75 rounded-lg flex gap-2 place-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>Filter</button>
                </div>
            </form>
        </div>
        <div class="mt-4">
            <div class="block overflow-x-auto p-8 text-dark">
                <form method="POST" action="/admindistribusiItem" enctype="multipart/form-data">
                    @csrf
                    <input hidden name="idDistribusi" value="{{ $idDistribusi }}" placeholder="">
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Jenis
                            Logistik</label>
                        <select id="id_barang" name="id_logistik"
                            class="bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            @foreach ($logistiks as $logistik)
                                <option value="{{ $logistik->id }}">{{ $logistik->nama_logistik }}</option>
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
