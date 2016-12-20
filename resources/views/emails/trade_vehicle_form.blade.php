<!DOCTYPE html>
<html>
<head>
	<title>Trade Vehicle Form</title>
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
		<th>Phone</th>
		<td>{{$data->phone}}</td>
	</tr>
	<tr>
		<th>Year</th>
		<td>{{$data->year}}</td>
	</tr>
	<tr>
		<th>Make</th>
		<td>{{$data->make}}</td>
	</tr>
	<tr>
		<th>Model</th>
		<td>{{$data->model}}</td>
	</tr>
	<tr>
		<th>Additional Vehicle Info</th>
		<td>{{$data->comment}}</td>
	</tr>
</table>
</body>
</html>