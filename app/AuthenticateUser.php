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

        $user = $this->users->findByUsernameOrCreate($this->getGoogleUser());

        \Auth::login($user, true);

        return $listener->userHasLoggedIn($user);
    }

    public function logout()
    {
        \Session::put('dstate', 'unsynced');
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