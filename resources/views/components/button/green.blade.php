<x-button 
    {{ $attributes->merge( [
        'class' => 'text-green-800 bg-white border-green-800 hover:bg-green-200'
    ]) }}>
    
    {{ $slot }}
</x-button>