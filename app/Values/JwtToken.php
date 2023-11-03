<?php

namespace App\Values;

final class JwtToken
{
    private $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * get token
     *
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * get exprires token
     *
     * @return int
     */
    public function getExpires(): int
    {
        return auth('api')->factory()->getTTL();
    }

    /**
     * get fresh token
     *
     * @return int
     */
    public function getFreshToken()
    {
        return auth('api')->refresh();
    }
}
