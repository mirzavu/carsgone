<!DOCTYPE html>
<html>
<head>
	<title>Credit Application</title>
</head>
<body>
<table>
	@if($data->set_vehicle)
	<tr>
		<th>Vehicle</th>
		<td>{{$data->year}} {{$data->make}} {{$data->model}}</td>
	</tr>
	@endif
	<tr>
		<th>First Name</th>
		<td>{{$data->first_name}}</td>
	</tr>
	<tr>
		<th>Last Name</th>
		<td>{{$data->last_name}}</td>
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
		<th>Street</th>
		<td>{{$data->street}}</td>
	</tr>
	<tr>
		<th>City</th>
		<td>{{$data->city}}</td>
	</tr>
	<tr>
		<th>Province</th>
		<td>{{$data->province}}</td>
	</tr>
	<tr>
		<th>Postal Code</th>
		<td>{{$data->postal_code}}</td>
	</tr>
	<tr>
		<th>Date of Birth</th>
		<td>{{$data->dob}}</td>
	</tr>
	<tr>
		<th>Social Insurance Number</th>
		<td>{{$data->sin}}</td>
	</tr>
	<tr>
		<th>Time At Address</th>
		<td>{{$data->time_address_year}} years and {{$data->time_address_month}}months</td>
	</tr>
	<tr>
		<th>Monthly Payment</th>
		<td>{{$data->monthly_payment}}</td>
	</tr>
	<tr>
		<th>Company</th>
		<td>{{$data->company}}</td>
	</tr>
	<tr>
		<th>Work Phone</th>
		<td>{{$data->work_phone}}</td>
	</tr>
	<tr>
		<th>Position</th>
		<td>{{$data->position}}</td>
	</tr>
	<tr>
		<th>Time At Job</th>
		<td>{{$data->time_job_year}} years and {{$data->time_job_month}}months</td>
	</tr>
	<tr>
		<th>Monthly Income</th>
		<td>{{$data->monthly_income}}</td>
	</tr>
</table>
</body>
</html>