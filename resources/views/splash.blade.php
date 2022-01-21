<x-guest-layout>
    <x-auth.card>
        <x-slot name="logo">
            <a href="/">
                <img src="{{ secure_asset('img/logo-big-white.png') }}" class="h-32" />
            </a>
        </x-slot>

        <div class="flex flex-col items-center w-full text-center">
            <h1 class="mb-4 text-xl font-bold text-gray-800">Welcome to Dropship Connect</h1>
            <p class="mb-4">
                Get started by clicking the Register button below. Or if you already have an account, click Login
            </p>
            <div class="flex justify-center space-x-4">
                <x-link.default href="/login">Login</x-link.default>
                <x-link.default href="/register">Register</x-link.default>
            </div>
        </div>


    </x-auth.card>

</x-guest-layout>
