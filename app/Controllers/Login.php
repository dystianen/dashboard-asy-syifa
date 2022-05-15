<?php

namespace App\Controllers;

use Faker\Provider\Base;

class Login extends BaseController
{
    public function index()
    {
        echo view('layouts/pages/login/index');
    }
}