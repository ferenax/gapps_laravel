<?php
namespace App;
use Laravel\Socialite\Contracts\Factory as Socialite;
use App\Repositories\UserRepository;

class AuthenticateUser {

    /**
     * @var UserRepository
     */
    private $users;
    /**
     * @var Socialite
     */
    private $socialite;

    public function __construct(UserRepository $users, Socialite $socialite)
    {
        $this->users = $users;
        $this->socialite = $socialite;
    }

    /**
     * @param $hasCode
     * @param AuthenticateUserListener $listener
     * @return mixed
     */
    public function execute($hasCode, AuthenticateUserListener $listener)
    {

        if ( ! $hasCode ) return $this->getAuthorizationFirst();

        $var = $this->getGoogleUser();

        $user = $this->users->findByUsernameOrCreate($var);

        \Session::put('token', $var->token );

        \Auth::login($user, true);

        return $listener->userHasLoggedIn($user);

    }

    public function logout()
    {

        \Auth::logout();

        return redirect('/');


    }

    private function getAuthorizationFirst()
    {

        return \Socialize::with('google')->redirect();

    }

    private function getGoogleUser()
    {

        return \Socialize::with('google')->user();
    }

}