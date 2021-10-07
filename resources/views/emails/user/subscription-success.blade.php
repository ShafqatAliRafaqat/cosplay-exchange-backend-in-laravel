@component('mail::message')
# Dear {{ $name }},

You have successfully subscribed to <strong>Cosplay-Exchange</strong>

<br>
Best of luck finding your next Cosplay.

Best Regards,<br>
{{ config('app.name') }}
@endcomponent
