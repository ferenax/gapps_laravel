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


    public function execute($hasCode)
    {

        if ( ! $hasCode ) return $this->getAuthorizationFirst();

        $user = \Socialize::with('google')->user();




        // $user = $this->socialite->driver('google')->user();

        dd($user);

    }

    private function getAuthorizationFirst()
    {

        return \Socialize::with('google')->redirect();
        // return $this->socialite->driver('google')->redirect();
    }
}