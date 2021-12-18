<div class="px-4 py-3 text-right sm:px-6">
    <button 
        {{ $attributes->merge([
            'type' => $attributes->get('type') ?? 'submit',
            'class' => 'inline-flex justify-center px-4 py-2 text-sm font-medium border rounded-md shadow-sm focus:outline-none transition duration-150 ease-in-out' 
                . ($attributes->get('disabled') ? ' opacity-75 cursor-not-allowed' : '')
                . ($attributes->get('fullWidth') ? ' w-full' : ''),
        ]) }}>

        {{ $slot }}

    </button>
</div>
