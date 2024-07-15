<?php

namespace App\Service;

use App\Models\User;

class TokenService
{
    public static function create(User $user, $abilities = ['*'], $expiration = null)
    {
        return $user->createToken('api_token_'.$user->email, $abilities, $expiration)->plainTextToken;
    }
}
