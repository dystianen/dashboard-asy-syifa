<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;
use Config\Services;

class SigninController extends BaseController
{
    public function index()
    {
        echo view('layouts/pages/login/index');
    }

    public function loginAuth()
    {
        $session = session();
        $userModel = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $data = $userModel->where('email', $email)->first();

        if ($data) {
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass);
            if ($authenticatePassword) {
                $ses_data = [
                    'id' => $data['user_id'],
                    'fullname' => $data['fullname'],
                    'email' => $data['email'],
                    'isLoggedIn' => TRUE
                ];

                $session->set($ses_data);
                return redirect()->to(base_url('/hero'));
            } else {
                $session->setFlashdata('failed', 'Password is incorrect.');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('failed', 'Email does not exist.');
            return redirect()->to('/login');
        }
    }

    function logout()
    {
        $session = session();
        $session->set(array(
            'id' => '',
            'fullname' => '',
            'email' => '',
            'isLoggedIn' => FALSE
        ));
        $session->destroy();
        return redirect()->to('/login');
    }

    public function register()
    {
        $data = [
            'validation' => Services::validation(),
        ];
        echo view('layouts/pages/register/index', $data);
    }

    public function registerSubmit()
    {
        helper(['form']);
        $userModel = new UserModel();

        $rules = [
            'fullname' => 'required|min_length[2]|max_length[50]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[4]|max_length[50]',
        ];

        if ($this->validate($rules)) {
            $data = [
                'fullname' => $this->request->getVar('fullname'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'created_at' => date('Y-m-d H:i:s'),
            ];

            $userModel->save($data);
            session()->setFlashdata('success', 'Registration Successfully.');
            return redirect()->to("/login");
        } else {
            $validation = Services::validation();
            return redirect()->to('/register')->withInput()->with('validation', $validation);
        }
    }
}
