<x-form.button 
    {{ $attributes->merge( [
        'class' => 'text-gray-800 bg-blue-200 border-gray-800 hover:bg-blue-500 hover:text-white'
    ]) }}>
    
    {{ $slot }}
</x-form.button>