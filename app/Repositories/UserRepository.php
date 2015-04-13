<?php namespace App\Repositories;
use App\User;

class UserRepository {

    public function findByUsernameOrCreate($userData)
    {


        $user = User::where('email', '=', $userData->email)->first();

        if(isset($user)) $this->checkIfUserNeedsUpdating($userData, $user);

        return User::firstOrCreate([
            'username' => $userData->getName(),
            'email' => $userData->getEmail(),
            'avatar' => $userData->getAvatar(),
            'gid' => $userData->getId(),
            'refresh_token' => $userData->getRefresh(),
        ]);

    }

    private function checkIfUserNeedsUpdating($data, $user)
    {
        $socialData = [
            'avatar' => $data->avatar,
            'email' => $data->email,
            'name' => $data->name,
        ];

        $dbData = [
            'avatar' => $user->avatar,
            'email' => $user->email,
            'name' => $user->username,
        ];
        $differences = array_diff($socialData, $dbData);
        if (! empty($differences)) {
            $user->avatar = $data->avatar;
            $user->email = $data->email;
            $user->username = $data->name;
            $user->save();
        }
    }

}