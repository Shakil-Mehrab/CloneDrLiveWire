@props([
    'name' => null,
    'pretext' => null,
])

<div class="col-span-6">
    <label for="{{ $name }}" class="block text-sm font-semibold text-gray-700">
        {{ $slot }}
    </label>
    <div class="flex mt-1 rounded-md shadow-sm">
        <span class="inline-flex items-center px-3 text-sm text-gray-500 border border-r-0 border-gray-300 rounded-l-md bg-gray-50">
            {{ $pretext }}
        </span>
        <input type="text" class="flex-1 block w-full border-gray-300 rounded-none focus:ring-blue-500 focus:border-blue-500 rounded-r-md sm:text-sm">
    </div>
</div>
