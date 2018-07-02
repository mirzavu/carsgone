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
        <th></th>
        <td>
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td>
                <div>
                  <!--[if mso]>
                    <v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="{{url('/vehicle').'/'.$data->vehicle_slug}}" target="_blank" style="height:36px;v-text-anchor:middle;width:150px;" arcsize="5%" strokecolor="#EB7035" fillcolor="#EB7035">
                      <w:anchorlock/>
                      <center style="color:#ffffff;font-family:Helvetica, Arial,sans-serif;font-size:16px;">View Vehicle &rarr;</center>
                    </v:roundrect>
                  <![endif]-->
                  <a href="{{url('/vehicle').'/'.$data->vehicle_slug}}" style="background-color:#0294d1;border:1px solid #0294d1;border-radius:3px;color:#ffffff;display:inline-block;font-family:sans-serif;font-size:16px;line-height:44px;text-align:center;text-decoration:none;width:150px;-webkit-text-size-adjust:none;mso-hide:all;" target="_blank">View Vehicle &rarr;</a>
                </div>
              </td>
            </tr>
          </table>
        </td>
      </tr>
    </table>
        </td>
      </tr>
    </table>
  </body>
</html>