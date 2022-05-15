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