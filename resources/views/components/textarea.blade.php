@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'rounded-md shadow-sm border-gray-300
focus:ring-blue-500 focus:border-blue-500 ']) !!}></textarea>
