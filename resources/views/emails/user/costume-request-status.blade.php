@component('mail::message')
# Dear {{ $name }},

Your request for Costume <strong>{{ $title }}</strong> has been <strong>{{ $message }}</strong> by the member.


Thanks,<br>
{{ config('app.name') }}
@endcomponent
