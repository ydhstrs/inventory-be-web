@extends('guest.layouts.main')
@section('container')
    <div class="w-screen flex flex-col items-center mt-10">
        <span class="font-bold text-3xl sm:text-5xl">Per Tahun 2022</span>

        <div class="mt-10 flex flex-wrap mx-auto justify-center gap-10">
            {{-- Card 1 --}}
            <div class="card bg-softIndigoColor p-5 shadow-lg flex flex-col rounded-lg pr-40 pb-20 max-w-sm">
                <span class="font-bold text-xl sm:text-2xl">Total Inventaris</span>
                <span class="font-bold text-6xl my-2 text-indigoColor">1070</span>
                <span class="font-bold text-lg sm:text-xl text-indigoColor">Barang</span>
            </div>

            {{-- Card 2 --}}
            <div class="card bg-softPinkColor p-5 shadow-lg flex flex-col rounded-lg pr-40 pb-20 max-w-sm">
                <span class="font-bold text-xl sm:text-2xl">Total Logistik</span>
                <span class="font-bold text-6xl my-2 text-pinkColor">3079</span>
                <span class="font-bold text-lg sm:text-xl text-pinkColor">Barang</span>
            </div>

            {{-- Card 3 --}}
            <div class="card bg-softGreenColor p-5 shadow-lg flex flex-col rounded-lg pr-40 pb-20 max-w-sm">
                <span class="font-bold text-xl sm:text-2xl">Total Distribusi</span>
                <span class="font-bold text-6xl my-2 text-greenColor">567</span>
                <span class="font-bold text-lg sm:text-xl text-greenColor">Barang</span>
            </div>
        </div>

        {{-- Card Slider --}}

        <div class="mt-20 flex flex-wrap mx-auto justify-center gap-10 bg-primaryColor py-10 w-screen">
            {{-- Card 1 --}}
            <div class="card bg-softIndigoColor p-5 shadow-lg flex flex-col rounded-lg pr-40 pb-20 max-w-sm">
                <span class="font-bold text-xl sm:text-2xl">Total Kendaraan</span>
                <span class="font-bold text-6xl my-2 text-indigoColor">1070</span>
                <span class="font-bold text-lg sm:text-xl text-indigoColor">Barang</span>
            </div>

            {{-- Card 2 --}}
            <div class="card bg-softPinkColor p-5 shadow-lg flex flex-col rounded-lg pr-40 pb-20 max-w-sm">
                <span class="font-bold text-xl sm:text-2xl">Total Shelter</span>
                <span class="font-bold text-6xl my-2 text-pinkColor">3079</span>
                <span class="font-bold text-lg sm:text-xl text-pinkColor">Barang</span>
            </div>

            {{-- Card 3 --}}
            <div class="card bg-softGreenColor p-5 shadow-lg flex flex-col rounded-lg pr-40 pb-20 max-w-sm">
                <span class="font-bold text-xl sm:text-2xl">Total Alat Penyelamatan </span>
                <span class="font-bold text-6xl my-2 text-greenColor">567</span>
                <span class="font-bold text-lg sm:text-xl text-greenColor">Barang</span>
            </div>

            {{-- Card 3 --}}
            <div class="card bg-softGreenColor p-5 shadow-lg flex flex-col rounded-lg pr-40 pb-20 max-w-sm">
                <span class="font-bold text-xl sm:text-2xl">Total Alat Dokumentasi</span>
                <span class="font-bold text-6xl my-2 text-greenColor">567</span>
                <span class="font-bold text-lg sm:text-xl text-greenColor">Barang</span>
            </div>
        </div>

        {{-- Statistik --}}

        <span class="font-bold text-3xl sm:text-5xl mt-20 text-center">
            Statistik Inventaris dan Logistik
        </span>

        <div class="flex flex-wrap mt-10 gap-6 w-screen">
            {{-- Left chart --}}
            <div class="w-screen sm:w-1/2 flex flex-col px-4 gap-2">
                <div class="p-6 bg-white rounded shadow">
                    {!! $chart->container() !!}
                </div>
                {{-- <div class="p-6 bg-white rounded shadow">
                    {!! $bpbdchart->container() !!}
                </div> --}}

            </div>
            {{-- Center chart --}}
            <div class="flex flex-col mx-auto">
                <div class="p-6  bg-white rounded shadow">
                    {!! $donutChart->container() !!}
                </div>
            </div>
            {{-- Right chart --}}

            <div class="flex flex-col mx-auto">
                {{-- Card --}}
                <div class=" rounded-lg bg-white p-4 drop-shadow-md">

                    <div class="flew flex-col">
                        <img src="https://statik.tempo.co/data/2021/10/13/id_1058209/1058209_720.jpg"
                            class="w-64 rounded-lg" />
                        <br>
                        <div class="font-bold text-lg">Kota Medan</div>
                        <div class=" text-base">Kota Medan</div>

                    </div>
                </div>
            </div>
        </div>


    </div>
    <script src="{{ $chart->cdn() }}"></script>
    {{ $chart->script() }}
    <script src="{{ $bpbdchart->cdn() }}"></script>
    {{ $bpbdchart->script() }}
    <script src="{{ $donutChart->cdn() }}"></script>
    {{ $donutChart->script() }}
@endsection
