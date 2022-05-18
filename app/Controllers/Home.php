<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'page' => 'dashboard',
        ];

        echo view('layouts/pages/admin/dashboard/index', $data);
    }
}