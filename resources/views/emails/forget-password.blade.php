

<h3>Hello,{{$name}} </h3>

<p>Your account password can be reset by clicking the button below. If you did not request a new password, please ignore this email.
</p>
<a href="{{ route('reset-password', ['token' => $token]) }}">Reset Password</a>
