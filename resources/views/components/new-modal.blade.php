@props([
'id',
'maxWidth',
'justify',
'title',
])

@php
$id = $id ?? md5($attributes->wire('model'));
$title = $title ?? '';

switch ($maxWidth ?? '2xl') {
case 'sm':
$maxWidth = 'sm:max-w-sm';
break;
case 'md':
$maxWidth = 'sm:max-w-md';
break;
case 'lg':
$maxWidth = 'sm:max-w-lg';
break;
case 'xl':
$maxWidth = 'sm:max-w-xl';
break;
case '2xl':
default:
$maxWidth = 'sm:max-w-2xl';
break;
}

switch ($justify ?? 'center') {
case 'start':
$justify = 'sm:justify-start';
break;
case 'end':
$justify = 'sm:justify-end';
break;
case 'center':
$justify = 'sm:justify-center';
break;
case 'between':
$justify = 'sm:justify-between';
break;
case 'around':
$justify = 'sm:justify-around';
break;
case 'evenly':
$justify = 'sm:justify-evenly';
break;
default:
$justify = 'sm:justify-center';
break;
}

@endphp
<div id="{{ $id }}" x-data="{ show: @entangle($attributes->wire('model')) }" x-show="show"
    x-on:close.stop="show = false" x-on:keydown.escape.window="show = false"
    class="fixed inset-x-0 top-0 z-50 min-h-screen sm:px-0 sm:flex sm:items-top {{ $justify }}" style="display: none;">
    {{-- x-on:click="show = false" --}}
    <div x-show="show" class="fixed inset-0 transition-all transform" x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>

    <div x-show="show"
        class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full {{ $maxWidth }}"
        x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
        <div class="flex flex-col h-full py-6 bg-white shadow-xl">
            <div class="px-4 sm:px-6">
                <div class="flex items-start justify-between">
                    <h2 class="text-lg font-medium text-gray-900" id="slide-over-title">
                        {{ $title }}
                    </h2>
                    <div class="flex items-center ml-3 h-7">
                        <button @click="show = false"
                            class="text-gray-400 bg-white rounded-md hover:text-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            <span class="sr-only">Close panel</span>
                            <i class="far fa-times fa-2x"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="relative flex-1 px-4 mt-6 sm:px-6">
                <div class="absolute inset-0 px-4 sm:px-6">
                    <div class="h-full p-4 overflow-y-auto border-2 border-gray-200 border-dashed" aria-hidden="true">
                        {{ $slot }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
