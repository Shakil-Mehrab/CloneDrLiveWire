@props([
    'name' => null,
    'description' => null,
    'disabled' => false,
])
<div class="col-span-6">
    <div class="flex items-start justify-between" x-data="{ enabled: @entangle($name) }"
        @undo.window="enabled = !enabled">
        <span class="flex flex-col flex-grow mr-2">
            <span class="text-sm font-medium text-gray-900">{{ $slot }}</span>
            <span class="text-sm text-gray-500">{{ $description }}</span>
        </span>
        <!-- Enabled: "bg-indigo-600", Not Enabled: "bg-gray-200" -->
        <button {{ $disabled ? ' disabled' : '' }} @click="$dispatch('toggled'); enabled = !enabled"
            :class="enabled ? 'bg-blue-500' : 'bg-gray-200'" type="button"
            class="relative inline-flex flex-shrink-0 h-6 transition-colors duration-200 ease-in-out bg-gray-200 border-2 border-transparent rounded-full cursor-pointer w-11 focus:outline-none focus:ring-2 focus:blue-offset-2 focus:ring-blue-500"
            role="switch">
            <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
            <span :class="enabled ? 'translate-x-5' : 'translate-x-0'" aria-hidden="true"
                class="inline-block w-5 h-5 transition duration-200 ease-in-out transform bg-white rounded-full shadow pointer-events-none ring-0"></span>
        </button>
    </div>
</div>
