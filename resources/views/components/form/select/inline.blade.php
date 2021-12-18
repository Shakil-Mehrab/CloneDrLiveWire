@props([
    'name' => null,
    'label' => null,
    'description' => null,
])

<div class="inline-flex items-center col-span-6 space-x-2">
    <label for="{{ $name }}"
        class="inline text-sm font-medium text-gray-700 whitespace-nowrap">{{ $label }}</label>
    <select @change="updated = true" {{ $attributes->whereStartsWith('wire:model') }}name="{{ $name }}"
        class="block py-2 pl-3 pr-10 my-1 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        {{ $slot }}
    </select>
    <p class="text-sm text-gray-400">{{ $description }}</p>
</div>
