<?php

namespace App\Controllers;

class User extends BaseController
{
    public function __construct()
    {
        if (session()->get('level') != "employee") {
            echo 'Access denied';
            exit;
        }
    }

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

    public function absent()
    {
        echo view('layouts/pages/User/absent');
    }

    public function permission()
    {
        echo view('layouts/pages/User/permission');
    }

    public function report()
    {
        echo view('layouts/pages/User/report');
    }

    public function task()
    {
        echo view('layouts/pages/User/task');
    }
    
    public function show() 
    {
        // Your Code...    
    }

    public function edit() 
    {
        // Your Code...    
    }

    public function update() 
    {
        // Your Code...    
    }

    public function destroy() 
    {
        // Your Code...    
    }
}