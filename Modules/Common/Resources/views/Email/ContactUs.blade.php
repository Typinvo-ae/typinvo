@component('mail::message')


<p> {{ $message }}   </p>


,phone :   {{ $phone }}<br>

@if ($email)
,email :  {{ $email }}<br>
@endif
loz moz
@endcomponent
