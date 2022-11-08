<?php

namespace App\Helper;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public $email, $password;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function validateInput()
    {
        $validate = Validated::make(
            ['email' => $this->email, 'password' => $this->password],
            [
                'email' => ['require', 'email:efc,dns', 'unique:users'],
                'password' => ['require', 'string']

            ]
        );

        if ($validate->fails()) {
            return ['status' => false, 'message' => $validate->messages()];
        } else {
            return ['status' => true];
        }
    }

    public function register($deviceName)
    {
        $validate = $this->validateInput();
        if ($validate['status'] == false) {
            return $validate;
        } else {
            $user = User::create(['email' => $this->email, 'password' => Hash::make(($this->password))]);
            $token = $user->createToken($deviceName)->plainTextToken;
            return ['status' => true, 'token' => $token, 'user' => $user];
        }
    }
}
