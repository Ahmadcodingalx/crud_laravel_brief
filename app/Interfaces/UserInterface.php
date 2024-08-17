<?php

namespace App\Interfaces;

interface UserInterface
{
    public function index();
    public function show();
    public function store(array $data);
    public function update();
    public function delete();
}
