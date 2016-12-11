<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
</head>
<body>
<p>Reset password by clicking <a href="{{ url("reset-password/{$user->token}") }}">here</a></p>
</body>
</html>