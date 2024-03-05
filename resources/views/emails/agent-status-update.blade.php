@component('mail::message')

Hi, {{ $details['name'] }} <br><br>

@if ($details['status'] == 1)
	Your Sysk CRM Agent Account Activated Successfully... 

	Your Password is : {{ $details['password'] }}
@else
	Your Sysk CRM Agent Account InActive Please contact at... 
	info@sysk.com
@endif




<br><br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
