@component('mail::message')
# You have been invited to partner with Dropship Connect.

Click the button below to accept the invite. You will be prompted to create a new account. 

@component('mail::button', ['url' => $url])
Accept Invite
@endcomponent

Thanks,<br>
The DropshipConnect Team
@endcomponent
