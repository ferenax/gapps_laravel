<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class MainController extends Controller {

	public function index()
    {
        return view('google_login');
    }

    public function back($user)
    {
        return view('google_welcomeback')->with('user', $user);
    }

}
