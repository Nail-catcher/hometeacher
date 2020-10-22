<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function index()
    {
    	$array = array();
    	$arrs = Storage::disk('public')->allFiles('/Hometeacher');
    	    	foreach ($arrs as $arr) {
    	    		$output  = str_replace("Hometeacher/", "./" ,$arr);
  					$time = Storage::lastModified($arr);
  					
  					$array[$output] = $time;
				}
        //print_r ($array);
        $response = [
            'success' => true,
            'data'    => $array,
            

        ];


        return response()->json($response, 200);
    }

    public function download(Request $request)
    {

    	return Storage::get($request->file);
    }
}
