@component('mail::message')
# The following produts have been removed from your store.

@foreach($products as $product)
<strong>{{ $product->name }}</strong>
-----------------------------------------------------
@foreach($product['variants'] as $variant)
- {{ $variant['sku'] }}
@endforeach

@endforeach

Thanks,<br>
The DropshipConnect Team
@endcomponent
