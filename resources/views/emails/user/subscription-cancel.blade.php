@component('mail::message')
# Dear {{ $name }}

We are sorry to see you go, if you change your mind you know where to find us! <br><br>
You have been <strong>Unsubscribed</strong> from <strong>Cosplay-Exchange</strong>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
