@props([
    'name' => null
])

<div @click.prevent="selectedTab = '{{ $name }}'" 
    class="px-4 py-4 mx-2 text-sm font-medium text-gray-800 rounded-lg hover:text-gray-700 hover:border-gray-300 whitespace-nowrap"
    :class="{ 'font-semibold bg-blue-200' : selectedTab === '{{ $name }}' }" 
>
    {{ $slot }}
</div>
