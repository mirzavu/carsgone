<!DOCTYPE html>
<html>
<head>
	<title>Confirm Email</title>
</head>
<body>
<p>Confirm your email by clicking <a href="{{ url("signup/confirm/{$user->token}") }}">here</a></p>
</body>
</html>