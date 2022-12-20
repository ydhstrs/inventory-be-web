<x-guest-layout>
    <div class="w-screen bg-primaryColor flex flex-col items-center justify-center overflow-y-scroll">

        <div class="card bg-white shadow-lg rounded-xl my-4">
            <div class="flex flex-wrap items-center gap-10">
                <img src="{{ asset('assets/login.png') }}" class="h-full hidden" alt="Logo" />

                <div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <div class="p-10 px-20 flex flex-col items-center justify-center">

                        @if ($errors->any())
                        <div id="alert" class="alert mx-10 alert bg-softPinkColor rounded-lg py-5 px-6 mb-4 text-base text-pinkColor" role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <span class="text-secondaryColor font-bold text-3xl mb-4 text-center">
                                Register Account</span>


                            <!-- Name -->
                            <div class="mt-5">
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                                    :value="old('name')" required autofocus />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    :value="old('email')" required />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <div class="mt-4">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">NIP</label>
                                <input type="text" id="nip" name="nip"
                                    class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                                    placeholder="" required>
                            </div>
                            <div class="mt-4">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">No Hp</label>
                                <input type="text" id="no_hp" name="no_hp"
                                    class="form-control bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg block w-full p-2.5"
                                    placeholder="" required>
                            </div>
                            <div class="mt-4">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">
                                    Kab/Kota
                                </label>
                                <select id="jenis_peralatan" name="id_kota"
                                    class="bg-gray-50 border border-gray-300 text-dark text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                    <option selected>Pilih Kab/Kota</option>
                                    @foreach ($kotas as $kota)
                                        <option value="{{ $kota->id }}">{{ $kota->nama_kota }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Password -->
                            <div class="mt-4">
                                <x-input-label for="password" :value="__('Password')" />

                                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                                    required autocomplete="new-password" />

                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            <!-- Confirm Password -->
                            <div class="mt-4 mb-10">
                                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                    name="password_confirmation" required />

                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>

                            <button class="bg-indigoColor w-full justify-center text-xl text-white p-3 rounded-3xl">
                                {{ __('Register') }}
                            </button>


                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
</x-guest-layout>
