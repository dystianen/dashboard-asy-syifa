<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        echo view('layouts/pages/admin/dashboard/index');
    }
}