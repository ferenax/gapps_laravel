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

    private $token;

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

        \Auth::login($user, true);

        return $listener->userHasLoggedIn($user);

    }

    public function logout()
    {

        \Auth::logout();
      //  $this->guard->logout();

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

    public function getContactList()
    {

        $client = new \GuzzleHttp\Client();

        $email = \Auth::user()->email;

        $json = $client->get('https://www.google.com/m8/feeds/contacts/'. $email . '/full', [
            'query' => [
                'prettyPrint' => 'false',
            ],
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $this->getGoogleUser()->token ,
            ],
        ]);

        dd($json);

        return $json;

    }
}