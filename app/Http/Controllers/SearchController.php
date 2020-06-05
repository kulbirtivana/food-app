<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Food;
use App\User;
use App\Profile;

class SearchController extends Controller
{
    //
    
	public function search(Request $request){
		$q =$request['q'];
		$foods = Food::where('foodname', 'LIKE', '%' .$q. '%')->get();

		if(count($foods) > 0)
			return view('food.index', compact('foods'))->withDetails($foods)->withQuery ( $q );
		else return view ('food.index')->withMessage('No Food available related to your search. Try something different');
	}

}
