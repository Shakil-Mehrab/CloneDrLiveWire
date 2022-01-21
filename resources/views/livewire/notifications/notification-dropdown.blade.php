<x-dropdown width="96">
    <x-slot name="trigger">
        <span class="inline-flex">
            <div class="p-1 -mx-1 text-xl">
                <span class="sr-only">View notifications</span>
                <i class="far fa-bell"></i>
            </div>
        </span>
    </x-slot>
    <x-slot name="content">
        @livewire('notifications.notification-dropdown-list')
    </x-slot>
</x-dropdown>
