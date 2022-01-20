@component('mail::message')
# You have been invited to join Colab

Please click the link below to join

@component('mail::button', ['url' => $url])
Join Now
@endcomponent

If you did not want to join, please ignore this email.

Thanks,<br>
The {{ config('app.name') }} Team
@endcomponent
