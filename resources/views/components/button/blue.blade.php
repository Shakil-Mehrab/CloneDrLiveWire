<x-button 
    {{ $attributes->merge( [
        'class' => 'text-white bg-blue-800 border-blue-900 hover:bg-blue-700'
    ]) }}>
    
    {{ $slot }}
</x-button>