@props([
    'ledgend' => null,
    'cols' => 1,
])

<div class="col-span-6">
    @if($cols == 2)
        <fieldset>
            <legend class="font-semibold text-gray-900">{{ $ledgend }}</legend>
            <div class="flex flex-wrap">
                {{ $slot }}
            </div>
        </fieldset>
    @else
        <fieldset>
            <legend class="font-semibold text-gray-900">{{ $ledgend }}</legend>
            <div class="mt-4">
                {{ $slot }}
            </div>
        </fieldset>
    @endif            
</div>