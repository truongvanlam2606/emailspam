<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use App\Values\JwtToken;
use Exception;
use Illuminate\Support\Facades\Hash;

class AuthService {

    protected $userRepository;

    public function __construct(
        UserRepository $userRepository
    )
    {
        $this->userRepository = $userRepository;
    }
    /**
     * RegisterUser function
     *
     * @param array $data
     * @return bool|User
     */
    public function registerUser(array $data)
    {
        $data['password'] = Hash::make($data['password']);
        $user = $this->userRepository->create($data);
        if (!$user) {
            return false;
        }
        return $user;
    }

}