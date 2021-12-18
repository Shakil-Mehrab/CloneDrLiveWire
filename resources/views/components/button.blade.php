<button 
    {{ $attributes->merge([
        'type' => 'submit', 
        'class' => 'inline-flex items-center px-4 py-2 border rounded-md font-semibold text-xs uppercase tracking-widest focus:outline-none disabled:opacity-25 transition ease-in-out duration-150'
            . ($attributes->get('disabled') ? ' opacity-75 cursor-not-allowed' : ''),
        '@click' => '',
        ]) 
    }}
>
    {{ $slot }}
</button>
