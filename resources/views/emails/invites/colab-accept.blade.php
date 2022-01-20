@component('mail::message')
# {{ $account->name }} accepted your invitation to join colab.

{{ $account->name }} created new account and accepted the colab join request.

@component('mail::button', ['url' => $url])
View Colab
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
