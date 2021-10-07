@component('mail::message')
# Dear Admin,

A Costume <strong>{{ $title }}</strong> has been marked as delivered. Click on the button below to confirm;

@component('mail::button', ['url' =>env('APP_URL'). '/login'])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
