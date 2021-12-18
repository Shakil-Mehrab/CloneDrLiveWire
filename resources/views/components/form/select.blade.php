@props([
    'name' => null,
    'label' => null,
    'description' => null,
])

<div class="col-span-6">
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700">{{ $label }}</label>
    <select @change="updated = true" {{ $attributes->whereStartsWith('wire:model') }}name="{{ $name }}" class="block w-full px-3 py-2 my-1 text-gray-800 bg-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        <option hidden class="text-gray-600">-- Select an option --</option>
        {{ $slot }}
    </select>
    <p class="text-sm text-gray-400">{{ $description }}</p>
</div>
