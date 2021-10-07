@component('mail::message')
# Dear Admin,

A new costume has been uploaded and is awaiting your approval. <br>
Clickon the button below to login and approve it!.

@component('mail::button', ['url' => getenv('APP_URL').'/login'])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
