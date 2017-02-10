<?php

if (!function_exists('classActivePath')) {
	function classActivePath($path)
	{
		return Request::is($path) ? ' class="active"' : '';
	}
}

if (!function_exists('classActiveSegment')) {
	function classActiveSegment($segment, $value)
	{
		if(!is_array($value)) {
			return Request::segment($segment) == $value ? ' class="active"' : '';
		}
		foreach ($value as $v) {
			if(Request::segment($segment) == $v) return ' class="active"';
		}
		return '';
	}
}

if (!function_exists('classActiveOnlyPath')) {
	function classActiveOnlyPath($path)
	{
		return Request::is($path) ? ' active' : '';
	}
}

if (!function_exists('classActiveOnlySegment')) {
	function classActiveOnlySegment($segment, $value)
	{
		if(!is_array($value)) {
			return Request::segment($segment) == $value ? ' active' : '';
		}
		foreach ($value as $v) {
			if(Request::segment($segment) == $v) return ' active';
		}
		return '';
	}
}

if (!function_exists('getLocation')) {
	function getLocation($request)
	{


		$ip = $request->ip();
		if (!empty($request->session()->get('lat'))) {
			// $loc['zip'] = $request->session()->get('zip');
			$loc['place'] = $request->session()->get('place');
			$loc['lat'] = $request->session()->get('lat');
			$loc['lon'] = $request->session()->get('lon');
			$loc['region'] = $request->session()->get('region');
			Log::info('###');
			Log::info($ip);
		}
		else
		{
			$ip = $request->ip();
			if ($ip[0]==':' || $ip== "127.0.0.1" || strpos($ip, '137.97') !== false) {
				$ip = '50.65.193.19';
			}
			Log::info('---');
			Log::info($ip);
			Log::info($request->ip());
			//If a bot arrives, serve sample location
			if (isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/bot|crawl|slurp|spider/i', $_SERVER['HTTP_USER_AGENT'])) {
			    // $loc['zip'] = 'T9E';
			    $loc['lat'] = 53.266;
				$loc['lon'] = -113.552;
				$loc['region'] = 'Alberta';
				$loc['place'] = 'Leduc2';
				Log::info('***');
				Log::info($_SERVER['HTTP_USER_AGENT']);
			}
			else //If a normal user
			{
			    $curl = curl_init();
	            curl_setopt_array($curl, array(
	                CURLOPT_RETURNTRANSFER => 1,
	                CURLOPT_URL => 'http://geoip.nekudo.com/api/'.$ip,
	                CURLOPT_USERAGENT => 'Codular Sample cURL Request'
	            ));
	            $resp = curl_exec($curl);
				$location = json_decode($resp, true);
				// http://freegeoip.net/json/50.65.216.255
				// $loc['zip'] =	$location['zip_code'];
				$loc['lat'] = $location['location']['latitude'];
				$loc['lon'] = $location['location']['longitude'];
				$loc['region'] = $location['country']['name'];
				

				//Fetch city from coordinates if empty
				if(empty($location['city']))
				{
					// $location['latitude'] = 53.55;$location['longitude']=-113.5;
					$url = "http://maps.googleapis.com/maps/api/geocode/json?latlng=".$location['latitude'].','.$location['longitude'];
                    $curl = curl_init();
                    curl_setopt($curl, CURLOPT_URL, $url);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($curl, CURLOPT_HEADER, false);
                    $loc_json = curl_exec($curl);
                    $retry = 0;
                    $loc_array = json_decode($loc_json);
                    while($loc_array->status == "UNKNOWN_ERROR" && $retry < 5){
                        $loc_json = curl_exec($curl);
                        $loc_array = json_decode($loc_json);
                        $retry++;
                    }
                    curl_close($curl);
                    if($loc_array->status == "OK")
                    {
                        foreach ($loc_array->results[0]->address_components as $component) {
						    
						    if(in_array("locality", $component->types))
						    {
						    	$location['city'] = $component->long_name;
						    }
						}

                    }  
				}
				$loc['place'] = $location['city'];
				
				// $loc['place'] = $loc['city'];
				// unset($loc['city']); //city is used in search page, so no clash

			}
			// $request->session()->put('zip', $loc['zip']);
			$request->session()->put('place', $loc['place']);
			$request->session()->put('lat', $loc['lat']);
			$request->session()->put('lon', $loc['lon']);
			$request->session()->put('region', $loc['region']);
			// $loc = json_decode(file_get_contents('http://ip-api.com/json/'.$ip),'true');
			
		}
		return $loc;
	}
}