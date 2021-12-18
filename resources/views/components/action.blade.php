@props([
    'id' => null, 
    'action' => null, 
    'method' => null,
    'values' => null,
])

<form id="{{ $id }}" action="{{ $action }}" method="POST">
    @csrf
    @if(!empty($method)) @method($method) @endif
    @if(!empty($values))
        @foreach($values as $key => $value)
        <input type="hidden" name="{{ $key }}" value="{{ $value }}" />
        @endforeach
    @endif
    <span class="inline-flex rounded-md shadow-sm">
        <button
            {{ $attributes->merge([
                'type' => 'submit',
                'class' => 'py-2 px-4 border rounded-md text-sm leading-5 font-semibold focus:outline-none transition duration-150 ease-in-out' . ($attributes->get('disabled') ? ' opacity-75 cursor-not-allowed' : ''),
                'onclick' => 'confirm("Are you sure?") || event.preventDefault()',
            ]) }}
        >
            {{ $slot }}
        </button>
    </span>
</form>
