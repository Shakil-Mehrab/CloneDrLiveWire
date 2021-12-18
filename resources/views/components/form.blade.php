@props([
    'method' => 'get',
    'action' => null,
    'buttonless' => false,
    'async' => false,
    'title' => '',
    'description' => '',
    'details' => '',
])

<div class="mb-8">
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">{{ $title }}</h3>
                <p class="mt-1 text-sm text-gray-600">
                    {!! $description !!}
                </p>
                <div class="my-4 text-xs text-gray-500">
                    {{ $details ?? '' }}
                </div>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <div class="mt-5 md:mt-0 md:col-span-2">
                @if ($async)
                    <form wire:submit.prevent="save" method="{{ $method === 'get' ? 'GET' : 'POST' }}"
                        action="{{ $action }}" x-data="{ updated: false }" @saved.window="updated = false"
                        @toggled="updated = true"
                        {{ $attributes->merge(['class' => $attributes->get('disabled') ? ' opacity-75 cursor-not-allowed' : '']) }}>
                    @else
                        <form method="{{ $method === 'get' ? 'GET' : 'POST' }}" action="{{ $action }}"
                            x-data="{ updated: false }" @saved.window="updated = false" @toggled="updated = true"
                            {{ $attributes->merge(['class' => $attributes->get('disabled') ? ' opacity-75 cursor-not-allowed' : '']) }}>
                @endif
                @csrf
                @if ($method !== 'get') @method($method) @endif

                <div class="mb-4 shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 space-y-6 bg-white sm:p-6">
                        <div class="grid grid-cols-6 gap-6">

                            {{ $slot }}

                        </div>
                    </div>
                </div>

                @if (!$buttonless)
                    <div x-show="!updated" class="flex justify-end space-x-4 x-cloak">
                        <div class="px-4 py-4"></div>
                    </div>
                    <div x-show="updated" class="flex justify-end space-x-4 x-cloak">
                        <x-form.button.dark type="submit">Save</x-form.button.dark>
                        <x-form.button.default @click="$dispatch('undo'); updated = false" type="reset">Cancel
                        </x-form.button.default>
                    </div>
                @endif
                </form>
            </div>
        </div>
    </div>
</div>
