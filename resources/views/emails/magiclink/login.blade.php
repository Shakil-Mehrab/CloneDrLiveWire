@component('mail::message')
# Log in to your account

Click the button below to magically log into your DropshipConnect account:

@component('mail::button', ['url' => $url])
Login Now
@endcomponent

Thanks,<br>
The DropshipConnect Team
@endcomponent
