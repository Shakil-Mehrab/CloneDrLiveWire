@component('mail::message')
# The following produts have been added to your store.


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
