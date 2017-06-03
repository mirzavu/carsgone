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

			if (isset($_SERVER['HTTP_USER_AGENT']) && preg_match('/bot|crawl|slurp|spider|sitemap/i', $_SERVER['HTTP_USER_AGENT'])) {
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
				//Tried http://freegeoip.net, http://geoip.nekudo.com/api but received incorrect coordinates
				//ipfingerprints.com blocked
			    
				$loc['lat'] = 53.266;
				$loc['lon'] = -113.552;
			
				// $loc['place'] = $loc['city'];
			}
			// $request->session()->put('zip', $loc['zip']);
			$request->session()->put('lat', $loc['lat']);
			$request->session()->put('lon', $loc['lon']);
			// $request->session()->put('region', $loc['region']);
			// $loc = json_decode(file_get_contents('http://ip-api.com/json/'.$ip),'true');
			
			}
		}
			
		
		return $loc;
	}
}