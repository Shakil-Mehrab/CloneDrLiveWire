<x-button 
    {{ $attributes->merge( [
        'class' => 'text-white bg-red-800 border-red-900 hover:bg-red-700'
    ]) }}>
    
    {{ $slot }}
</x-button>