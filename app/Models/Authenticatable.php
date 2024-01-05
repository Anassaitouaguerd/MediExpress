<?php

namespace App\Models;
Interface Authenticatable
{
    public function register($data);
    public function login($email, $password);
}