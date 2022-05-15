<?php

namespace App\Controllers;

class User extends BaseController
{
    public function index()
    {
        echo view('layouts/pages/User/index');
    }

    public function scanner()
    {
        echo view('layouts/pages/User/scan');
    }

    public function profile()
    {
        echo view('layouts/pages/User/profile');
    }
}