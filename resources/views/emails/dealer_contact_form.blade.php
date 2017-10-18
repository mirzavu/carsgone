<!DOCTYPE html>
<html>
  <head>
    <title>Dealer Contact Form</title>
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
        <th>Message</th>
        <td>{{$data->message}}</td>
      </tr>
      <tr>
        <th>View Vehicle</th>
        <td>
        	<a href="{{url('/vehicle').'/'.$data->vehicle_slug}}" target="_blank">
          Click here
          </a>
        </td>
      </tr>
    </table>
  </body>
</html>