<div class="overflow-y-auto max-h-96 group">
    @forelse ($this->notifications() as $notification)
        @livewire('notifications.notification-dropdown-item', ['notification' => $notification], key($notification->id))
    @empty
        <div
            class="block px-4 py-2 text-sm leading-5 text-gray-700 transition duration-150 ease-in-out hover:bg-gray-100 focus:outline-none focus:bg-gray-100">
            You've no notification.</div>
    @endforelse
</div>
