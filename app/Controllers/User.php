<?php

namespace App\Controllers;

class User extends UserController
{
    public function index()
    {
        echo view('users');
    }
}