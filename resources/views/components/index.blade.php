<x-app-layout screen="colabs">
    <x-slot name="header">
        <p>{{ __('Draft Colabs') }}</p>
    </x-slot>

    <x-slot name="actions">
        {{-- @livewire('colabs.add') --}}

    </x-slot>

    <x-slot name="main">
        {{-- @livewire('colabs.colab-list') --}}
    </x-slot>

    <x-slot name="extended">
        <div class="mx-4 ">

            <div class="w-full text-center text-green-800" wire:loading>
                {{ __('Loading...') }}
            </div>
            <div class="w-full text-center text-green-500" wire:loading.remove>
                {{ __('No colab selected. Click on a colab to the left to see details') }}
            </div>
        </div>
    </x-slot>
</x-app-layout>
