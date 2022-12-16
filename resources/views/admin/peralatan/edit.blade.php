<x-app-layout>
    <div class="m-10 bg-white p-10 rounded-lg">
        <span class="font-bold text-4xl">Edit Peralatan</span>

        <div class="mt-10">
            <div class="block overflow-x-auto p-8 text-dark">
                <form method="POST" action="{{route('peralatan.update')}}" enctype="multipart/form-data">
                    @csrf

                    <input hidden type="text" name="id" value="{{$peralatan->id}}">

                    <div class="mb-6">
                        <label for="name"
                            class="block mb-2 text-sm font-medium text-gray-900">Nama</label>
                        <input type="text" id="nama" name="nama" value="{{$peralatan->nama}}"
                            class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                            placeholder="{{$peralatan->nama}}" required>
                    </div>
                    <div class="mb-6">
                        <label for="jumlah"
                            class="block mb-2 text-sm font-medium text-gray-900">Jumlah</label>
                        <input type="number" id="jumlah" name="jumlah" value="{{$peralatan->jumlah}}"
                            class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                            placeholder="{{$peralatan->jumlah}}" required>
                    </div>


                    <div class="mb-6">
                        <label for="filefoto"
                            class="block mb-2 text-sm font-medium text-gray-900">Foto</label>
                            @if ($peralatan->foto!=null)
                                <img src="{{$peralatan->foto}}" class="w-64 h-64 rounded mb-2"/>
                            @endif
                        <input type="file" id="filefoto" name="filefoto" value="{{$peralatan->foto}}"
                            class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                            placeholder="{{$peralatan->foto}}" >
                    </div>

                    <div class="mb-6">
                        <label for="tahun"
                            class="block mb-2 text-sm font-medium text-gray-900">Tahun</label>
                        <input type="date" id="tahun" name="tahun" value="{{$peralatan->tahun}}"
                            class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                            placeholder="{{$peralatan->tahun}}" required>
                    </div>

                    <div class="mb-6">
                        <label for="keterangan"
                            class="block mb-2 text-sm font-medium text-gray-900">Keterangan</label>
                        <textarea type="text" id="keterangan" name="keterangan" value="{{$peralatan->keterangan}}"
                            class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                            placeholder="" required>{{$peralatan->keterangan}}</textarea>
                    </div>
                    <button type="submit"
                        class="text-white bg-blue hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Simpan</button>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
