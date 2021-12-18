<x-link 
    {{ $attributes->merge( [
        'class' => 'text-gray-800 bg-white border-gray-800 hover:bg-gray-200 hover:text-white active:bg-gray-300'
    ]) }}>
    
    {{ $slot }}
</x-link>