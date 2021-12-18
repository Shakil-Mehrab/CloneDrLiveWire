<x-link 
    {{ $attributes->merge( [
        'class' => 'text-blue-800 bg-blue-200 border-blue-800 hover:bg-blue-500'
    ]) }}>
    
    {{ $slot }}
</x-link>