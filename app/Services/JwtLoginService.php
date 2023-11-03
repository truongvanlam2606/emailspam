<?php

namespace App\Services;

use App\Values\JwtToken;

class JwtLoginService {

    /**
     * Login function
     *
     * @param [type] $credentials
     * @return JwtToken
     */
    public function login(array $credentials)
    {
        if (!$token = auth('api')->attempt($credentials)) {
            return false;
        }
        return new JwtToken($token);
    }

}