<!DOCTYPE html>
<html>
<head>
	<title>Reset Password</title>
</head>
<body>
<p>
We received a request to reset the password associated with this e-mail address. If you made this request, please follow the instructions below.
<br>
<br>
Click the link below to reset your password using our secure server:
<br>
<br>
<a href="{{ url("reset-password/{$user->token}") }}">{{ url("reset-password/{$user->token}") }}</a>
<br>
<br>
If you did not request to have your password reset you can safely ignore this email. Rest assured your customer account is safe.
<br>
<br>
If clicking the link doesn't seem to work, you can copy and paste the link into your browser's address window, or retype it there. Once you have returned to Carsgone.com, we will give instructions for resetting your password.
</p>
</body>
</html>