@component('mail::message')
# Dear {{ $name }},

Someone has requested your costume: <strong>{{ $title }}</strong>. <br><br> Click on the button below to login to Accept/Reject it.

@component('mail::button', ['url' => env('APP_URL'). '/login'])
Login
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
