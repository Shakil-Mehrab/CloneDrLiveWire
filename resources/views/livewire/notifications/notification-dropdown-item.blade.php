<x-dropdown-notification-link>
    <div class="group p-1 @if ($notification->read_at) bg-transparent @else bg-blue-100 @endif">
        <a wire:click.prevent="markAsRead"
            class="absolute z-50 p-1 text-gray-700 transition-opacity duration-200 bg-gray-200 border border-gray-200 rounded-full opacity-100 right-4 md:opacity-0 group-hover:opacity-100"
            href="#" title="Mark as read">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z" />
            </svg>
        </a>
        <a href="{{ route('colabs', ['selected' => $notification->data['colab']['id']]) }}">You have received an
            invitation from {{ $notification->data['colab']['account']['name'] }} as a
            {{ $notification->data['invite']['type'] }}.</a>
        <div class="text-xs font-light text-blue-600">{{ $notification->created_at->diffForHumans() }}</div>
    </div>
</x-dropdown-notification-link>
