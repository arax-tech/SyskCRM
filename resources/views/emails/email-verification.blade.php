@component('mail::message')
# Verification

Please verify your account by clicking on very now button.


@component('mail::button', ['url' => $details['verify_url']])
Verify Now
@endcomponent


Thanks,<br>
{{ config('app.name') }}
@endcomponent
