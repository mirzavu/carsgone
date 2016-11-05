<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Make;
use App\Models\BodyStyleGroup;
use Barryvdh\Debugbar\Facade as Debugbar;
use Storage;

class PostController extends Controller
{
	protected $storage_path;

	public function __construct()
	{
		$this->storage_path = storage_path() . '/uploads/vehicle'; 
	}
    

    public function post_ad(Request $request)
	{	
		$data['location'] = getLocation($request);
		$data['makes'] = Make::all();
		$data['body_style_groups'] = BodyStyleGroup::all();
		return view('front.post.post', $data);
	}

	public function save_image(Request $request)
	{		
		if ($request->hasFile('file')) {
			Debugbar::error($this->storage_path);
			$request->file('file')->move($this->storage_path, $request->file('file')->getClientOriginalName());
		}
	}

	public function remove_image(Request $request)
	{	
		Debugbar::error($request->input('file_name'));
		Storage::delete("vehicle/".$request->file_name);
		return response()->json(['status' => 'success']);
	}

	public function rotate_image(Request $request)
	{	
		$filename = $this->storage_path."/".$request->file_name;
		// Load the image
		$source = imagecreatefromjpeg($filename);
		$degrees = -90;
		// Rotate
		$rotate = imagerotate($source, $degrees, 0);
		//and save it on your server...
		imagejpeg($rotate, $this->storage_path."/".$request->file_name);
		return response()->json(['status' => 'success']);
	}
}
