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

    public function getContactList()
    {

        $client = new \GuzzleHttp\Client();

        $email = \Auth::user()->email;

        $token = \Session::get('token');

        $json = $client->get('https://www.google.com/m8/feeds/contacts/default/full/',  [

            'headers' => [
                'Accept' => 'application/atom+xml',
                'Authorization' => 'Bearer ' . $token,

            ],
        ]);

        dd($json->getBody()->__toString());

        return $json;

    }
}