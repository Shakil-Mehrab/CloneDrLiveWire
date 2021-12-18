@props(['brand', 'last4', 'default' => false])


<div class="flex flex-wrap w-full h-auto p-3 text-white bg-blue-500 rounded-lg">
    <i class="fa-4x mb-3 fab {{ 'fa-cc-' . $brand }}"></i>
    <p class="w-full text-sm text-right md:text-lg">XXXX XXXX XXXX
        {{ $last4 }}
    </p>
</div>
