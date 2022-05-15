<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class SignupController extends BaseController
{

    public function index()
    {
        helper(['form']);
        echo view('layouts/pages/register/index');
    }

    public function store()
    {
        helper(['form']);
        $rules = [
            'fullname'          => 'required|min_length[2]|max_length[50]',
            'email'             => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'password'          => 'required|min_length[4]|max_length[50]',
            'confirmPassword'   => 'matches[password]'
        ];
          
        if ($this->validate($rules)) {
            $userModel = new UserModel();

            $data = [
                'fullname'     => $this->request->getVar('fullname'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];

            $userModel->save($data);
            return redirect()->to("/login");
        } else {
            $data['validation'] = $this->validator;
            echo view('layouts/pages/register/index', $data);
        }
    }
}