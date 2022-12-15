<x-guest-layout>
    <div class="w-screen h-screen bg-primaryColor flex flex-col items-center justify-center">

        <div class="card bg-white shadow-lg rounded-xl">
            <div class="flex flex-wrap items-center gap-10">
                <img src="{{ asset('assets/login.png') }}" class="h-full hidden" alt="Logo" />

                <div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <div class="p-10 px-20 flex flex-col items-center justify-center">



                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <span class="text-secondaryColor font-bold text-3xl mb-4 text-center">Register Account</span>


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

                            <button class="bg-blue w-full justify-center text-xl text-white p-3 rounded-3xl">
                                {{ __('Register') }}
                            </button>


                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <div class="card w-screen flex  justify-center  absolute bottom-0 left-0">
        <div class="bg-white p-8 rounded-tr-3xl rounded-tl-3xl w-3/4 flex flex-row justify-center">

            <img src="{{ asset('assets/logo.png') }}" class="h-6 mr-3 sm:h-12" alt="Logo" />
        </div>
    </div>
</x-guest-layout>
