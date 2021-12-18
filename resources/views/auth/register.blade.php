<x-guest-layout>
    <x-auth.card>
        <x-slot name="logo">
            <a href="/">
                <img src="{{ secure_asset('img/logo-big-white.png') }}" class="h-32" />
            </a>
        </x-slot>

        <div class="flex flex-col items-center w-full mb-4 text-center">
            <h1 class="mb-4 text-xl font-bold text-gray-800">Create Your Account</h1>
            <p class="mb-2 text-gray-400">Enter your email address and password to create your account</p>
        </div>

        <!-- Validation Errors -->
        <x-auth.validation-errors class="mb-4" :errors="$errors" />

        <div class="flex flex-col space-x-4 md:flex-row">
            <div class="w-full px-16 py-4">
                <form method="POST" action="{{ route('magic-link.register') }}">
                    @csrf
                    <!-- Email Address -->
                    <input type="hidden" name="token" value="{{ $request->token }}">

                    <div>
                        <x-label for="email" :value="__('Email')" />

                        <x-input id="email" class="block w-full mt-1" type="email" name="email"
                            :value="old('email', $request->email)" required placeholder="Enter Email Address"
                            autofocus />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-label for="password" :value="__('Password')" />

                        <x-input id="password" class="block w-full mt-1" type="password" name="password" required
                            autocomplete="current-password" placeholder="Enter Password" />
                    </div>

                    <div class="mt-4">
                        <x-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-input id="password_confirmation" class="block w-full mt-1" type="password"
                            name="password_confirmation" required placeholder="Confirm Password" />
                    </div>

                    <div class="mt-4">
                        {{-- {!! htmlFormSnippet() !!} --}}
                        <x-input-error for="recaptcha" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="text-sm text-gray-600 underline hover:text-gray-900"
                                href="{{ route('password.request') }}">
                                {{ __('Already Registered?') }}
                            </a>
                        @endif

                        <x-button class="ml-3">
                            {{ __('Register') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>

    </x-auth.card>
</x-guest-layout>
