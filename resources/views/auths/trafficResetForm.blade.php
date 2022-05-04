@component('mail::message')
# Password Reset

As you have requested for password reset, we have sent you a link.
Please click on the button to reset.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/password/traffic/reset/'.$email.'/'.$token])
Click here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
