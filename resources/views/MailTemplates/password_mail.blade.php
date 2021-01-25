<!DOCTYPE html>
<html>
<head>
    <title>Password Reset</title>
</head>
<body>
<h2>Password Reset Link </h2>
<br/>
Your registered email-id is {{$user->email}} , Please click on the below link to reset your password
<br/>
<a href="{{url('/newpassword', $user->email)}}">Reset</a>
</body>
</html>
