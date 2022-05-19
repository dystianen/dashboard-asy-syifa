<?php

namespace App\Controllers;

use App\Models\UserModel;
use Config\Services;

class Employee extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $user = $userModel->findAll();
        $data = [
            'page' => 'employee',
            'user' => $user
        ];

        $data['data'] = $data;

        return view('layouts/pages/admin/employee/index', $data);
    }

    public function create()
    {
        helper(['form']);
        $data = [
            'page' => 'employee',
            'validation' => Services::validation(),
        ];

        echo view('layouts/pages/admin/employee/create', $data);
    }

    public function save()
    {
        helper(['form']);
        $rules = [
            'nik' => 'required|min_length[16]|max_length[16]|is_unique[users.nik]',
            'fullname' => 'required|min_length[2]|max_length[50]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[4]|max_length[50]',
            'confirmPassword' => 'matches[password]',
            'date_of_birth' => 'required',
            'place_of_birth' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'phone_number' => 'required',
            'address' => 'required'
        ];

        if ($this->validate($rules)) {
            $userModel = new UserModel();

            $data = [
                'nik' => $this->request->getVar('nik'),
                'fullname' => $this->request->getVar('fullname'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'date_of_birth' => $this->request->getVar('date_of_birth'),
                'place_of_birth' => $this->request->getVar('place_of_birth'),
                'gender' => $this->request->getVar('gender'),
                'age' => $this->request->getVar('age'),
                'phone_number' => $this->request->getVar('phone_number'),
                'address' => $this->request->getVar('address'),
                'level' => 'employee'
            ];

            $userModel->save($data);
            return redirect()->to("/admin/employee");
        } else {
            $validation = Services::validation();
            return redirect()->to('/admin/employee/form')->withInput()->with('validation', $validation);
        }
    }
}