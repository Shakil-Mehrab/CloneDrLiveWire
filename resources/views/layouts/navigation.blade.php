<!-- Top nav-->
<header class="relative flex items-center flex-shrink-0 h-16 bg-white">
    <!-- Logo area -->
    <div class="absolute inset-y-0 left-0 md:static md:flex-shrink-0">
        <a href="{{ route('splash') }}"
            class="flex items-center justify-center w-16 h-16 bg-cyan-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-600 md:w-20">
            <img class="w-auto h-8" src="{{ secure_asset('img/logo-white.png') }}" alt="Dropship Connect">
        </a>
    </div>

    <!-- Menu button area -->
    <div class="absolute inset-y-0 right-0 flex items-center pr-4 sm:pr-6 md:hidden">
        <!-- Mobile menu button -->
        <button type="button"
            class="inline-flex items-center justify-center p-2 -mr-2 text-gray-400 rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-600">
            <span class="sr-only">Open main menu</span>
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <!-- Desktop nav area -->
    <div class="hidden ml-4 md:min-w-0 md:flex-1 md:flex md:items-center md:justify-between">
        <!-- Middle -->
        <div class="flex-1 min-w-0">
            <div class="relative max-w-2xl text-gray-400 focus-within:text-gray-500">
            </div>
        </div>
        <!-- Right side -->
        <div class="flex items-center flex-shrink-0 pr-4 ml-10 space-x-10">
            <div class="flex items-center space-x-2">
                @livewire('notifications.notification-dropdown')

                <x-dropdown>
                    <x-slot name="trigger">
                        <span class="sr-only">Open user menu</span>
                        <img class="w-10 h-10 rounded-full" src="{{ asset(optional(Auth::user()->avatar)->url) }}"
                            alt="">
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link href="{{ route('profile') }}">Your Profile</x-dropdown-link>
                        <x-dropdown-link
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            href="{{ route('logout') }}">Log Out</x-dropdown-link>
                    </x-slot>
                </x-dropdown>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>


            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide this `div` based on menu open/closed state -->
</header>
