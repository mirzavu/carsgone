<!DOCTYPE html>
<html>
<head>
	<title>Contact Form</title>
</head>
<body>
<table>
	<tr>
		<th>Name</th>
		<td>{{$data->name}}</td>
	</tr>
	<tr>
		<th>Email</th>
		<td>{{$data->email}}</td>
	</tr>
	<tr>
		<th>Subject</th>
		<td>{{$data->subject}}</td>
	</tr>
	<tr>
		<th>Message</th>
		<td>{{$data->message}}</td>
	</tr>
</table>
</body>
</html>