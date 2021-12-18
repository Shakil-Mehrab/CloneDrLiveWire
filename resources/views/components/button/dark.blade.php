<x-button 
    {{ $attributes->merge( [
        'class' => 'text-white bg-gray-800 border-gray-900 hover:bg-gray-700'
    ]) }}>
    
    {{ $slot }}
</x-button>