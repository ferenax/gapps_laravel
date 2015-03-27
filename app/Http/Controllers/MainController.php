<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class MainController extends Controller {


    public function index()
    {
        if (\Auth::check()) return redirect('google_welcome');
        return redirect('google_login');
    }

	public function first()
    {
        \Session::flush();
        return view('google_login');
    }

    public function back()
    {
        $user = \Auth::user();
        return view('google_welcomeback')->with('user', $user);
    }

}
