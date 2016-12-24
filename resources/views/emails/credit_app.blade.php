<!DOCTYPE html>
<html>
<head>
	<title>Credit Application</title>
</head>
<body>
<table>
	<tr>
		<th>Name</th>
		<td>{{$data->name}}</td>
	</tr>
	<tr>
		<th>Phone Number</th>
		<td>{{$data->phone}}</td>
	</tr>
	<tr>
		<th>Email</th>
		<td>{{$data->email}}</td>
	</tr>
	<tr>
		<th>Province</th>
		<td>{{$data->province}}</td>
	</tr>
	<tr>
		<th>Income</th>
		<td>{{$data->income}}</td>
	</tr>
	<tr>
		<th>Vehicle Type</th>
		<td>{{$data->body}}</td>
	</tr>
	<tr>
		<th>Budget</th>
		<td>{{$data->budget}}</td>
	</tr>
</table>
</body>
</html>