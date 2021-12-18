@props([
    'name' => null,
    'description' => null,
])

<div class="col-span-6">
    <label for="{{ $name }}" class="block text-sm font-semibold text-gray-700">{{ $slot }}</label>
    <div class="mt-1">
        <textarea {{ $attributes->whereStartsWith('wire:model') }} id="about" name="about" rows="3" class="block w-full mt-1 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
    </div>
    <p class="mt-2 text-sm text-gray-500">
        {{ $description }}
    </p>
</div>