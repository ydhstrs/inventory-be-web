<x-guest-layout>
    <div class="w-screen h-screen bg-primaryColor flex flex-col items-center justify-center">

        <div class="card bg-white shadow-lg rounded-xl">
            <div class="flex flex-wrap items-center gap-10">
                <img src="{{ asset('assets/login.png') }}" class="h-full hidden" alt="Logo" />

                <div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <div class="p-10 flex flex-col items-center justify-center">

                        @if ($errors->any())
                            <div id="alert"
                                class="alert mx-10 alert bg-softPinkColor rounded-lg py-5 px-6 mb-4 text-base text-pinkColor"
                                role="alert">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <span class="text-secondaryColor font-bold text-3xl mb-4 text-center">Login Admin</span>


                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-input-label for="email" :value="__('Email')" />
                                <input id="email" class="block mt-1 w-full" type="email" name="email"
                                    :value="old('email')" required autofocus />
                            </div>

                            <!-- Password -->
                            <div class="mt-4 mb-10">
                                <x-input-label for="password" :value="__('Password')" />

                                <input id="password" class="block mt-1 w-full" type="password" name="password" required
                                    autocomplete="current-password" />
                            </div>

                            <button class="bg-blue w-full justify-center text-xl text-white p-3 rounded-3xl">
                                {{ __('Log in') }}
                            </button>

                            <div class="mt-5">
                                <a href="{{ route('register') }}">
                                    Don't have a account? <span class="text-purple">Click Here</span>
                                </a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <div class="card w-screen flex  justify-center  absolute bottom-0 left-0">
        <div class="bg-white p-8 rounded-tr-3xl rounded-tl-3xl w-3/4 flex flex-row gap-4 justify-center">
            <img src="{{ asset('assets/logo_pemprovsu.png') }}" class="h-6 mr-3 sm:h-12" alt="Logo" />
            <img src="{{ asset('assets/logo.png') }}" class="h-6 mr-3 sm:h-12" alt="Logo" />
        </div>
    </div>
</x-guest-layout>
