<?php namespace App\Http\Controllers;

use App\Http\Requests;

class MainController extends Controller {


    public function index()
    {
        if (\Auth::check()) return view('google_welcomeback')->with('user', \Auth::user());
        return view('google_login');
    }

    public function dashboard()
    {
        return view('pages.dashboard');
    }

}
