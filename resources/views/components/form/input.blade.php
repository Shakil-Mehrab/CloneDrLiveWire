@props([
    'name' => null,
    'description' => null,
    'placeholder' => null,
    'value' => null,
])

<div class="col-span-6">
    <label for="{{ $name }}" class="block text-sm font-semibold text-gray-700">{{ $slot }}</label>
    <input {{ $attributes->whereStartsWith('wire:model') }} @change="updated = true"
        type="{{ $attributes['type'] ?? 'text' }}" name="{{ $name }}"
        class="block w-full my-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
        placeholder="{{ $placeholder }}" value="{{ $value }}">
    <p class="text-sm text-gray-400">{{ $description }}</p>
    @error($name) <span class="w-full text-sm text-center text-red-500">{{ $message }}</span> @enderror
</div>
