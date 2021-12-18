@props([
    'name' => null,
    'description' => null,
    'fullWidth' => false,
])

<div class="mb-4 items-start col-span-6 {{ ($fullWidth) ? 'w-full' : 'w-1/2' }}">
    <div class="flex items-start">
        <div class="flex items-center h-5">
            <input @change="updated = true" {{ $attributes }} name="{{ $name }}" type="checkbox" class="w-4 h-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
        </div>
        <div class="ml-3 text-sm">
            <label for="{{ $name }}" class="font-medium text-gray-700">{{ $slot }}</label>
            <p class="text-sm text-gray-400">{{ $description }}</p>
        </div>
    </div>
</div>