<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

	//
	public function about()
	{
		$name = "Someone's name";
		$facts = [
			'Trees are high',
			'But buildings are higher'
		];
		return view('pages.about', compact('name', 'facts'));
	}

}
