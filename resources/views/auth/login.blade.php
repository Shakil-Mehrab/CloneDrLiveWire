<x-guest-layout>
    <x-auth.card>
        <x-slot name="logo">
            <a href="/">
                <img src="{{ secure_asset('img/logo-big-white.png') }}" class="h-32" />
            </a>
        </x-slot>

        <div class="flex flex-col items-center w-full mb-4 text-xl font-bold">
            <h1 class="text-gray-800 ">Sign in to your account</h1>
            <p class="-mt-1">or <a href="/register" class="font-bold text-blue-500">start your 14-day free
                    trial</a></p>
        </div>

        <!-- Session Status -->
        <x-auth.session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth.validation-errors class="mb-4" :errors="$errors" />

        <div class="flex flex-col space-x-4 md:flex-row">
            <div class="w-full px-16 py-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <h2 class="mb-2 text-lg font-semibold text-center text-gray-500">Sign in using a password</h2>
                    <p class="mb-4 text-sm text-center text-gray-400">Enter your email and password here to login.</p>
                    <!-- Email Address -->
                    <div>
                        <x-label for="email" :value="__('Email')" />

                        <x-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"
                            required placeholder="Enter Email Address" autofocus />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password" :value="__('Password')" />

                        <x-input id="password" class="block w-full mt-1" type="password" name="password" required
                            autocomplete="current-password" placeholder="Enter Password" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="text-blue-600 border-gray-300 rounded shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="text-sm text-gray-600 underline hover:text-gray-900"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <x-button class="ml-3">
                            {{ __('Login') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
        </x-auth-card>
</x-guest-layout>
