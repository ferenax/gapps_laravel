<?php
namespace App;
use Laravel\Socialite\Contracts\Factory as Socialite;
use App\Repositories\UserRepository;
use Illuminate\Contracts\Auth\Guard;

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
    private $guard;

    public function __construct(UserRepository $users, Socialite $socialite, Guard $guard)
    {

        $this->users = $users;
        $this->socialite = $socialite;
        $this->guard = $guard;
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

        $this->guard->login($user, true);

        return $listener->userHasLoggedIn($user);


    }

    public function logout()
    {

        $this->guard->logout();

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