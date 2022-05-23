<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

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
                    'id' => $data['id'],
                    'fullname' => $data['fullname'],
                    'email' => $data['email'],
                    'level' => $data['level'],
                    'isLoggedIn' => TRUE
                ];

                $session->set($ses_data);

                    return redirect()->to('/admin/dashboard');
//                if ($data['level'] == 'employee') {
//                    return redirect()->to('/user');
//                } else {
//                }

            } else {
                $session->setFlashdata('failed', 'Password is incorrect.');
//                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('failed', 'Email does not exist.');
//            return redirect()->to('/login');
        }
    }

    function logout() {
		$session = session();
        $session->set(array(
            'id' => '',
            'fullname' => '',
            'email' => '',
            'level' => '',
            'isLoggedIn' => FALSE
        ));
        $session->destroy();
        return redirect()->to('/login');
    }


}