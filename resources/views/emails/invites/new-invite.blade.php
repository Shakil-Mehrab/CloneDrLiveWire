@component('mail::message')
# {{ $name }}, You have been invited to use {{ config('app.name') }} as a {{ $type }}.

{{ $message }}

Please click the link below to get started with Dropship Connect

@component('mail::button', ['url' => $url])
Start collaborating
@endcomponent

[Dropship Connect](https://dropshipconnect.co) automates dropshipping processes for Shopify and WooCommerce stores. Use Dropship Connect to easily sync product inventory levels, orders and fulfilment statuses between you and your dropship partners.

If you don't want to created your account, please ignore this email

Thanks,<br>
The DropshipConnect Team
@endcomponent
