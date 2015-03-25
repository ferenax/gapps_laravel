<?php
namespace App;
use Laravel\Socialite\Contracts\Factory as Socialite;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;

class AuthenticateUser {

    /**
     * @var UserRepository
     */
    private $users;
    /**
     * @var Socialite
     */
    private $socialite;
    /**
     * @var Guard
     */
    private $auth;

    public function __construct(UserRepository $users, Socialite $socialite, Guard $auth)
    {

        $this->users = $users;
        $this->socialite = $socialite;
        $this->guard = $auth;
    }


    /**
     * @param $hasCode
     * @param AuthenticateUserListener $listener
     * @return mixed
     */
    public function execute($request, AuthenticateUserListener $listener)
    {

        if ( ! $request ) return $this->getAuthorizationFirst();

        $user = $this->users->findByUsernameOrCreate($this->getGoogleUser());

        $this->auth->login($user, true);

        return $listener->userHasLoggedIn($user);


    }

    public function logout()
    {

        $this->auth->logout();

        return redirect('/');


    }

    private function getAuthorizationFirst()
    {

      //  return $this->socialite->driver('google')->redirect();
        return \Socialize::with('google')->redirect();

    }

    private function getGoogleUser()
    {

       // return $this->socialite->driver('google')->user();
        return \Socialize::with('google')->user();
    }
}