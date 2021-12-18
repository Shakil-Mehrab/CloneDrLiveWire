<span class="rounded-md shadow-sm {{ ($attributes->get('wide')) ? 'w-full' : '' }}">
    <a {{ $attributes->merge([
            'class' => 'inline-flex justify-center px-4 py-2 text-sm font-medium border rounded-md shadow-sm focus:outline-none transition duration-150 ease-in-out',             
        ]) }}>

        {{ $slot }}

    </a>
</span>
