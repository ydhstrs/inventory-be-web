<x-app-layout>
    <div class="m-10 bg-white p-10 rounded-lg">
        <span class="font-bold text-4xl">Distribusi</span>

        <div class="mt-10">

            <div class="flex flex-row gap-2">
                <a href="{{route('distribusi.draft')}}" class="text-lg p-4 bg-blue-600 text-white rounded-2xl ">
                    Distribusi Logistik
                </a>
            </div>
            <div class="overflow-x-auto relative mt-5">
                <div class="flex flex-col">
                    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="overflow-hidden">
                                <table class="min-w-full">
                                    <thead class="border-b bg-primaryColor rounded-lg text-white">
                                        <tr>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                #
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Nama
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                status
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                keterangan
                                            </th>
                                            <th scope="col"
                                                class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($distribusi as $item)
                                        <tr class="border-b ">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $loop->iteration }}
                                            </td>
                
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $item->keterangan }}
                                            </td>
                                            <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap">
                                                {{ $item->status }}
                                            </td>
                        
                                            <td>
                                                {{-- <form action="{{ route('kategori.delete', $item->id) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit">
                                                    <svg class="w-10 h-10 bg-pinkColor p-2 rounded text-white"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5"
                                                        stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                
                                                </button>
                                            </form> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
