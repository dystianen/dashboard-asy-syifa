<?php

namespace App\Controllers;

class Employee extends BaseController
{
    public function index()
    {
        echo view('layouts/pages/employee');
    }
}