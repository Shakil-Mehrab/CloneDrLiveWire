@component('mail::message')
# You have been invited to Collaborate with {{ $partner->name }} as a supplier

Click the button below to accept the invite. If you don't have a Lets Cobo account, you will be prompted to create one. 

@component('mail::button', ['url' => $url])
Accept Collaboration
@endcomponent

Thanks,<br>
The DropshipConnect Team
@endcomponent
