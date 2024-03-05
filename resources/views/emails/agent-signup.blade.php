@component('mail::message')
# Agent Sign Up Notification

<b>Agent Company Name : </b> {{ $details['agent_company_name'] }} <br>
<b>Company Registration Number : </b> {{ $details['company_registration_number'] }} <br>
<b>Year of Establishment : </b> {{ $details['year_of_establishment'] }} <br>
<b>City : </b> {{ $details['city'] }} <br>
<b>State : </b> {{ $details['state'] }} <br>
<b>Country : </b> {{ $details['country'] }} <br>
<b>Email : </b> {{ $details['email'] }} <br>
<b>Contact Number : </b> {{ $details['contact_number'] }} <br>



Thanks,<br>
{{ config('app.name') }}
@endcomponent
