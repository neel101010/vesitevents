<!DOCTYPE html>
<html>
<head>
    <title>Welcome Email</title>
</head>
<body>
<h2>Welcome to the site </h2>
@php
    $verify = \App\Models\VerifyUser::where('user_id',$user->id)->first()
@endphp
<br/>
Your registered email-id is {{$user->email}} , Please click on the below link to verify your email account
<br/>
<a href="{{url('/verify', $verify->token)}}">Verify Email</a>
</body>
</html>
