<!DOCTYPE html>
<html>
<head>
	<title>Dealer Finance Form</title>
</head>
<body>
<table>
	<tr>
		<th>Name</th>
		<td>{{$data->name}}</td>
	</tr>
	<tr>
		<th>Phone</th>
		<td>{{$data->phone}}</td>
	</tr>
	<tr>
		<th>Contact Option</th>
		<td>{{$data->contact}}</td>
	</tr>
	<tr>
		<th>Vehicle Model</th>
		<td>{{$data->year}} {{$data->make}} {{$data->model}}</td>
	</tr>
	<tr>
		<th>Vehicle Price</th>
		<td>{{$data->price}} </td>
	</tr>
</table>
</body>
</html>