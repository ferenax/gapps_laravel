<?php namespace App\Repositories;
use App\User;

class UserRepository {

    public function findByUsernameOrCreate($userData)
    {

        return User::firstOrCreate([

            'username' => $userData->getName(),
            'email' => $userData->getEmail(),
            'avatar' => $userData->getAvatar(),
            'gid' => $userData->getId(),


        ]);




    }

}