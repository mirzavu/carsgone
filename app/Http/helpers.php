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
		if ($request->session()->has('zip')) {
			$loc['zip'] = $request->session()->get('zip');
			$loc['place'] = $request->session()->get('place');
			$loc['lat'] = $request->session()->get('lat');
			$loc['lon'] = $request->session()->get('lon');
			$loc['region'] = $request->session()->get('region');
		}
		else
		{
			$ip = $request->ip();
			if ($ip[0]==':' || $ip=="137.97.229.196") {
				$ip = '50.65.193.19';
			}
			//If a bot arrives, serving sample location
			if (isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/bot|crawl|slurp|spider/i', $_SERVER['HTTP_USER_AGENT'])) {
			    $loc['zip'] = 'T9E';
			    $loc['lat'] = 53.266;
				$loc['lon'] = -113.552;
				$loc['region'] = 'Alberta';
				$loc['place'] = 'Leduc';
			}
			else //If a normal user
			{
			    $curl = curl_init();
	            curl_setopt_array($curl, array(
	                CURLOPT_RETURNTRANSFER => 1,
	                CURLOPT_URL => 'http://freegeoip.net/json/'.$ip,
	                CURLOPT_USERAGENT => 'Codular Sample cURL Request'
	            ));
	            $resp = curl_exec($curl);
				$location = json_decode($resp, true);
				// http://freegeoip.net/json/50.65.216.255
				$loc['zip'] =	$location['zip_code'];
				$loc['lat'] = $location['latitude'];
				$loc['lon'] = $location['longitude'];
				$loc['region'] = $location['region_name'];
				$loc['place'] = $location['city'];
				// $loc['place'] = $loc['city'];

				// unset($loc['city']); //city is used in search page, so no clash

			}
			$request->session()->put('zip', $loc['zip']);
			$request->session()->put('place', $loc['place']);
			$request->session()->put('lat', $loc['lat']);
			$request->session()->put('lon', $loc['lon']);
			$request->session()->put('region', $loc['region']);
			// $loc = json_decode(file_get_contents('http://ip-api.com/json/'.$ip),'true');
			
		}
		return $loc;
	}
}