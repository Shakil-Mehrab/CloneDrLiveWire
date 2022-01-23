<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dropship Connect - {{ Auth::check() ? Auth::id() . ' : ' . Auth::user()->account->id : '' }}</title>

    <link rel="apple-touch-icon" sizes="57x57" href="/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://kit.fontawesome.com/ba9834eef9.js" crossorigin="anonymous"></script>
    @livewireStyles

    <!-- Scripts -->
    @stack('head_scripts')

    <style>
        [x-cloak] {
            display: none;
        }

        .pop-over::before {
            content: '';
            position: absolute;
            left: -18px;
            top: 10px;
            width: 0;
            height: 0;
            border-bottom: 20px solid white;
            border-left: 28px solid transparent;
            transform: rotate(-28deg);
        }

    </style>


</head>

<body class="font-sans antialiased">
    <x-banner />

    <div class="flex flex-col h-screen overflow-hidden bg-gray-100">
        @include('layouts.navigation')

        @impersonating($guard = null)
        <div
            class="fixed px-3 py-2 text-sm text-center text-gray-100 bg-red-500 border rounded-md shadow-md top-5 left-1/2">
            <div class="flex items-center justify-between">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                <div class="ml-2">
                    {{ auth()->user()->account->name }}
                </div>
                <a href="{{ route('impersonate.leave') }}"
                    class="inline-flex items-center px-4 py-2 ml-3 text-xs font-semibold tracking-widest uppercase transition duration-150 ease-in-out bg-red-800 border rounded-md focus:outline-none disabled:opacity-25 hover:bg-white hover:text-red-800">Leave</a>
            </div>
        </div>
        @endImpersonating

        <div class="flex flex-1 min-h-0 overflow-hidden">
            @include('layouts.sidebar')

            <!-- Main area -->
            <main class="flex-1 min-w-0 lg:flex">

                <!-- Main column -->
                @php
                    $header = $header ?? null;
                @endphp
                <aside class=" m-8 mr-4 relative {{ $header ? '' : 'hidden' }}" x-data="{visibility:false}">


                    <div
                        class="relative flex flex-col flex-none h-full p-4 overflow-y-auto border-2 border-gray-200 border-dashed rounded-lg">
                        <div class="flex justify-between w-full px-4 mb-4">
                            <h1 id="main-heading" class="mb-2 text-2xl font-bold text-gray-800">{{ $header }}</h1>
                            <div>{{ $actions ?? null }}</div>
                        </div>
                        {{ $main ?? null }}
                    </div>
                </aside>

                <!-- Extended column -->
                {{-- <section aria-labelledby="main-heading"
                    class="{{ $header ? 'w-3/4' : 'w-full' }} h-full m-8 ml-4 overflow-y-auto">
                    @if (auth()->user()->account->hasStripeAccountId() &&
    !auth()->user()->account->hasCompletedOnboarding())
                        <div class="p-4 bg-pink-600 border-l-4 border-pink-700">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="w-5 h-5 text-gray-100" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-white">
                                        Payment from your retailers are currently disabled as your Stripe account is not
                                        yet
                                        complete.
                                        <a href="{{ route('stripe.dashboard') }}"
                                            class="font-medium text-white underline hover:text-gray-100">
                                            Click here to complete your Stripe Onboarding.
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="flex flex-col w-full p-4 border-2 border-gray-200 border-dashed rounded-lg ">
                        {{ $extended }}
                    </div>
                    <div class="h-16">
                    </div>
                </section> --}}

            </main>

        </div>
        {{-- @include('layouts.footer') --}}
    </div>

    @stack('body_scripts')

    <x-notification />

    @livewireScripts
    <script src="{{ mix('/js/app.js') }}"></script>

    <script type="text/javascript">
        ! function(e, t, n) {
            function a() {
                var e = t.getElementsByTagName("script")[0],
                    n = t.createElement("script");
                n.type = "text/javascript", n.async = !0, n.src = "https://beacon-v2.helpscout.net", e.parentNode
                    .insertBefore(n, e)
            }
            if (e.Beacon = n = function(t, n, a) {
                    e.Beacon.readyQueue.push({
                        method: t,
                        options: n,
                        data: a
                    })
                }, n.readyQueue = [], "complete" === t.readyState) return a();
            e.attachEvent ? e.attachEvent("onload", a) : e.addEventListener("load", a, !1)
        }(window, document, window.Beacon || function() {});
    </script>
    <script type="text/javascript">
        window.Beacon('init', '602eb7f4-0f21-44d5-9e25-1566cef55c5d')
    </script>
    @auth
        <script type="text/javascript">
            window.Beacon("identify", {
                name: "{{ Auth::user()->first_name }}",
                email: "{{ Auth::user()->email }}",
                "User Id": "{{ Auth::user()->id }}",
                "Account Id": "{{ Auth::user()->account->id }}",
            });
        </script>
    @endauth
</body>

</html>
