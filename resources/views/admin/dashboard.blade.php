<x-app-layout>
    <div class=" flex flex-col items-center mt-10">
        <span class="font-bold text-3xl sm:text-5xl">Per Tahun 2022</span>

        <div class="mt-10 flex flex-wrap mx-auto justify-center gap-10">
            {{-- Card 1 --}}
            <div class="card bg-softIndigoColor p-5 shadow-lg flex flex-col rounded-lg pr-40 pb-20 max-w-sm">
                <span class="font-bold text-xl sm:text-2xl">Total Peralatan</span>
                <span class="font-bold text-6xl my-2 text-indigoColor">{{$peralatan}}</span>
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

        {{-- Statistik --}}

        <span class="font-bold text-3xl sm:text-5xl mt-20 text-center">
            Statistik Inventaris dan Logistik
        </span>

        <div class="flex flex-wrap mt-10 w-full justify-center">
            {{-- Left chart --}}
            <div class="w-full sm:w-1/2 flex flex-col px-4 gap-2">
                <div class="p-6 bg-white rounded shadow">
                    {!! $chart->container() !!}
                </div>
                <div class="p-6 bg-white rounded shadow">
                    {!! $bpbdchart->container() !!}
                </div>

            </div>
            {{-- Center chart --}}
            <div class="flex flex-col mx-auto">
                <div class="p-6  bg-white rounded shadow">
                    {!! $donutChart->container() !!}
                </div>
            </div>
        </div>


    </div>

</x-app-layout>


<script src="{{ $chart->cdn() }}"></script>
{{ $chart->script() }}
<script src="{{ $bpbdchart->cdn() }}"></script>
{{ $bpbdchart->script() }}
<script src="{{ $donutChart->cdn() }}"></script>
{{ $donutChart->script() }}
