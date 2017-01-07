<!DOCTYPE html>
<html>
<head>
	<title>Confirm Email</title>
</head>
<body>
<p>Hello {{ $user->name }},</p>
<p>Thanks for registering your account in Carsgone!</p>
<p>Please confirm your email address by clicking <a href="{{ url("signup/confirm/{$user->token}") }}">here</a></p>
</body>
</html>