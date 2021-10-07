@component('mail::message')
# <center>Welcome To Cosplay-Exchange</center>

Hi There, <br>
Welcome to <strong>Cosplay-Exchange</strong> <br> Click on the button below to login to our system

@component('mail::button', ['url' => getenv('APP_URL').'/login'])
Login
@endcomponent

Best Regards,<br>
{{ config('app.name') }}
@endcomponent
