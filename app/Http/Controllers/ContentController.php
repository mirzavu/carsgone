<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContentPage;
use App\Http\Requests;

class ContentController extends Controller
{
    public function viewPage($slug)
    {
    	
    	$content = ContentPage::where('slug', $slug)->value('content');
    	echo $content;
    }
}
