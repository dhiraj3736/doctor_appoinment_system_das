@component('mail::message')

<p>Hello {{$input->fullname}},</p>

@component('mail::button',['url'=>url('verify/'.$input->remember_token)])
Verify
@endcomponent

<p>In case you have issue please contact our contact us.</p>
Thanks <br/>
{{config('Laravel')}}
@endcomponent