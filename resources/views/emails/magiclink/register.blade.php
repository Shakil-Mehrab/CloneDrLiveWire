@component('mail::message')
# Register Your Account

Click the button below to register your new DropshipConnect account:

@component('mail::button', ['url' => $url])
Register Account
@endcomponent

Thanks,<br>
The DropshipConnect Team
@endcomponent
