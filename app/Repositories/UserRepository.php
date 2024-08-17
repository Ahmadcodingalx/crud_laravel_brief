<?php

namespace App\Repositories;

use App\Interfaces\LoginInterface;
use App\Interfaces\UserInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository implements UserInterface
{
    public function index()
    {
        return User::all();
    }

    public function show() 
    {}
    public function store(array $data)
    {
       return User::create($data);
    }
    public function update()
    {}

    public function delete()
    {}
}