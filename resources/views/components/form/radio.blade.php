@props([
    'name' => null,
    'value' => null,
    'description' => null,
])

<div class="flex items-start">
    <div class="flex items-center h-5">
        <input @change="updated = true" {{ $attributes->whereStartsWith('wire:model') }} value="{{ $value }}" name="{{ $name }}" type="radio" class="w-4 h-4 text-blue-600 border-gray-300 focus:ring-blue-500">
    </div>
    <div class="ml-3 text-sm">
        <label for="{{ $name }}" class="font-medium text-gray-700">{{ $slot }}</label>
        <p class="text-sm text-gray-400">{{ $description }}</p>
    </div>
</div>
