<?php namespace App\Http\Controllers;

use App\AuthenticateUser;
use App\AuthenticateUserListener;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AuthController extends Controller implements AuthenticateUserListener
{

	public function login(AuthenticateUser $authenticateUser, Request $request){

       return $authenticateUser->execute($request->has('code'), $this);
    }

    public function userHasLoggedIn($user)
    {

        return redirect('/');
    }

    public function logout(AuthenticateUser $authenticateUser){


        return $authenticateUser->logout();

    }
}
