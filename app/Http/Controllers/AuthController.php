<?php namespace App\Http\Controllers;

use App\AuthenticateUser;
use App\ApiCall;
use App\AuthenticateUserListener;
use App\Http\Requests;
use Illuminate\Http\Request;

class AuthController extends Controller implements AuthenticateUserListener
{

	public function login(AuthenticateUser $authenticateUser, Request $request)
    {
       return $authenticateUser->execute($request->has('code'), $this);
    }

    public function userHasLoggedIn($user)
    {
        return redirect('/');
    }

    public function logout(AuthenticateUser $authenticateUser)
    {
        return $authenticateUser->logout();
    }

    public function getContactList(ApiCall $apiCall)
    {
        $response = $apiCall->getContactList()->getBody();

        $JSONarray=json_decode($response,true);

       return view('pages.contactlist')->with('response', $JSONarray);

    }

    public function getDriveFileList(ApiCall $apiCall)
    {
        $response = $apiCall->getDriveFileList()->getBody();

        $JSONarray=json_decode($response,true);

        return view('pages.drivefilelist')->with('response', $JSONarray);

    }

}
