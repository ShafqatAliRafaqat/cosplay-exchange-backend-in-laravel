@component('mail::message')
# Dear {{ $name }},

Your requested costume <strong>{{ $title }}</strong> has been shipped by the member. Following are the details <br><br>

Tracking Number: {{ $shipping->tracking_number }}<br>
Tracking Link: <a href="{{ $shipping->tracking_link }}">Tracking Link</a><br>
Postal Service: {{ $shipping->postal_service }}


Thanks,<br>
{{ config('app.name') }}
@endcomponent
