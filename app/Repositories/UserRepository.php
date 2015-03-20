<?php namespace App\Repositories;
use App\User;

class UserRepository {

    public function findByUsernameOrCreate($userData)
    {
        dd($userData);
        return User::firstOrCreate([

            'username' => $userData->name,
            'email' => $userData->email,
            'avatar' => $userData->avatar,


        ]);




    }

}