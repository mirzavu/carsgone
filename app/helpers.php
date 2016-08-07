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
			$loc['city'] = $request->session()->get('city');
			$loc['lat'] = $request->session()->get('lat');
			$loc['lon'] = $request->session()->get('lon');
		}
		else
		{
			$ip = $request->ip();
			$loc = json_decode(file_get_contents('http://ip-api.com/json/123.237.131.97'),'true');
			$request->session()->put('zip', $loc['zip']);
			$request->session()->put('city', $loc['city']);
			$request->session()->put('lat', $loc['lat']);
			$request->session()->put('lon', $loc['lon']);
		}
		return $loc;
	}
}