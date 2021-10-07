@component('mail::message')
# Dear {{ $name }},

Your costume <strong>{{ $title }}</strong> has been <strong>{{ $message }}</strong> by the administrator!


Thanks,<br>
{{ config('app.name') }}
@endcomponent
