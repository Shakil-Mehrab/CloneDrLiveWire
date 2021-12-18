<div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-3 md:gap-6']) }}>
    @if (isset($title))
        <x-section-title>
            <x-slot name="title">{{ $title }}</x-slot>
            @if (isset($description))
                <x-slot name="description">{{ $description }}</x-slot>
            @endif
        </x-section-title>
    @endif

    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="overflow-hidden shadow sm:rounded-md">
            <div class="px-4 py-5 bg-white sm:p-6">
                <div class="grid grid-cols-6 gap-6">
                    {{ $content }}
                </div>
            </div>
        </div>
    </div>
</div>
