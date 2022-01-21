<!-- Narrow sidebar-->
<nav aria-label="Sidebar" class="hidden md:block md:flex-shrink-0 md:bg-gray-800 md:overflow-y-auto">
    <div class="flex flex-col items-center justify-between h-full ">
        <div class="flex flex-col w-20 h-full p-3 space-y-3">
            @if (auth()->user()->account->isPartner())
                <a href="{{ route('partner.accounts') }}"
                    class="inline-flex items-center justify-center flex-shrink-0 text-2xl rounded-lg h-14 w-14 {{ $screen === 'partner-accounts' ? 'text-white' : 'text-gray-500' }}">
                    <span class="sr-only">Accounts</span>
                    <i class="fas fa-users"></i>
                </a>
            @elseif (!auth()->user()->isAdmin())
                <a href="{{ route('colabs') }}"
                    class="inline-flex items-center justify-center flex-shrink-0 rounded-lg text-2x h-14 w-14 {{ $screen === 'colabs' ? 'text-white' : 'text-gray-500' }}">
                    <span class="sr-only">Colabs</span>
                    <i class="far fa-hands-helping"></i>
                </a>

                <a href="/connectors"
                    class="inline-flex items-center justify-center flex-shrink-0 text-2xl rounded-lg h-14 w-14 {{ $screen === 'connectors' ? 'text-white' : 'text-gray-500' }}">
                    <span class="sr-only">Connectors</span>
                    <i class="far fa-bolt"></i>
                </a>
                <a href="/orders"
                    class="inline-flex items-center justify-center flex-shrink-0 text-2xl rounded-lg h-14 w-14 {{ $screen === 'orders' ? 'text-white' : 'text-gray-500' }}">
                    <span class="sr-only">Orders</span>
                    <i class="fas fa-dollar-sign"></i>
                </a>

                {{-- <a href="/payments"
                class="inline-flex items-center justify-center flex-shrink-0 text-2xl rounded-lg h-14 w-14 {{ ($screen === 'payments') ? 'text-white' : 'text-gray-500' }}">
            <span class="sr-only">Payments</span>
            <i class="far fa-money-bill-wave-alt"></i>
            </a> --}}
            @else
                <a href="{{ route('admin.dashboard') }}"
                    class="inline-flex items-center justify-center flex-shrink-0 text-2xl rounded-lg h-14 w-14 {{ $screen === 'admin-dashboard' ? 'text-white' : 'text-gray-500' }}">
                    <span class="sr-only">Accounts</span>
                    <i class="fas fa-users"></i>
                </a>
                <a href="{{ route('admin.colabs') }}"
                    class="inline-flex items-center justify-center flex-shrink-0 text-2xl rounded-lg h-14 w-14 {{ $screen === 'admin-colabs' ? 'text-white' : 'text-gray-500' }}">
                    <span class="sr-only">Colabs</span>
                    <i class="far fa-hands-helping"></i>
                </a>
                <a href="{{ route('admin.partners') }}"
                    class="inline-flex items-center justify-center flex-shrink-0 text-2xl rounded-lg h-14 w-14 {{ $screen === 'admin-partners' ? 'text-white' : 'text-gray-500' }}">
                    <span class="sr-only">Partners</span>
                    <i class="fas fa-hat-cowboy"></i>
                </a>
                <a href="{{ route('admin.plans') }}"
                    class="inline-flex items-center justify-center flex-shrink-0 text-2xl rounded-lg h-14 w-14 {{ $screen === 'admin-plans' ? 'text-white' : 'text-gray-500' }}">
                    <span class="sr-only">Plans</span>
                    <i class="fas fa-list"></i>
                </a>

                @if (auth()->user()->isSuper())
                    <a href="{{ route('admin.health') }}" target="_blank"
                        class="inline-flex items-center justify-center flex-shrink-0 text-2xl rounded-lg h-14 w-14">
                        <span class="sr-only">Health</span>
                        <x-svg.pulse-svg />
                    </a>
                    <a href="/horizon"
                        class="inline-flex items-center justify-center flex-shrink-0 text-2xl rounded-lg h-14 w-14">
                        <span class="sr-only">Horizon</span>
                        <x-svg.horizon-svg />
                    </a>
                @endif
            @endif

        </div>
        <div>
            <a href="{{ route('account') }}"
                class="inline-flex items-center justify-center flex-shrink-0 text-2xl rounded-lg h-14 w-14 {{ $screen === 'settings' ? 'text-white' : 'text-gray-500' }}">
                <span class="sr-only">Settings</span>
                <i class="far fa-cogs"></i>
            </a>
        </div>
    </div>
</nav>
