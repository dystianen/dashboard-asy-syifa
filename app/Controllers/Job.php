<?php

namespace App\Controllers;

class Job extends BaseController
{
    public function index()
    {
        echo view('layouts/pages/job/index');
    }
}