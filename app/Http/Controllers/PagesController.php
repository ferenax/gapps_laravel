<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

	//
public function index()
{

	$lessons = ['Lesson 1', 'Lesson 2', 'Lesson 3'];
	$name = 'Amine Berrouho';

	return view('pages.home' , compact('lessons') );	

}

public function about()
{

	return view('pages.about');
}

	

}
