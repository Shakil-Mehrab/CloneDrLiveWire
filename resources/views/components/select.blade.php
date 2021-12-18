@props(['disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'w-full rounded-md shadow-sm
    border-gray-300
    focus:ring-blue-500 focus:border-blue-500 ']) !!}>
    {{ $options }}
</select>
