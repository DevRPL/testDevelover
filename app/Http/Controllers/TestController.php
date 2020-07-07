<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;


class TestController extends Controller
{
    public function index()
    {
        return view('test');
    }

    public function create(Request $request)
    {
    	$mystring = strtolower($request->word2);
    	$findMe = strtolower($request->word1);
		$pos =strpos($mystring, $findMe);

		if ($pos === false) {
		    return redirect()->back()->withError("The string ".$findMe." was not found in the string " .$mystring);
		} else {
			return redirect()->back()->withSuccess("The string ".$findMe."  was found in the string  ".$mystring);
		}
    }
}
