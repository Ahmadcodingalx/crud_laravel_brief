<?php

namespace App\Repositories;

use App\Interfaces\LoginInterface;
use Illuminate\Support\Facades\Auth;

class AuthRepository implements LoginInterface
{
    public function login(array $data)
    {
        return Auth::attempt($data);
    }
}