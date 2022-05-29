<?php

namespace App\Controllers;

use App\Models\JobModel;
use App\Models\UserModel;
use Config\Services;

class Employee extends BaseController
{
    protected $userModel, $jobModel;

    public function __construct()
    {
        $this->userModel = new UserModel();

        $this->jobModel = new JobModel();

        if (session()->get('level') != "admin") {
            echo 'Access denied';
            exit;
        }
    }

    public function index()
    {
        $user = $this->userModel->findAll();
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
            'job' => $this->jobModel->findAll()
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
            'address' => 'required',
            'position' => 'required',
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
                'position' => $this->request->getVar('position'),
                'level' => 'employee',
                'created_at' => date("Y-m-d", time()),
            ];

            $userModel->save($data);
            return redirect()->to("/admin/employee");
        } else {
            $validation = Services::validation();
            return redirect()->to('/admin/employee/form')->withInput()->with('validation', $validation);
        }
    }

    public function delete($id)
    {
        $this->userModel->delete($id);
        return redirect()->to('/admin/employee');
    }

    public function edit($id)
    {
        helper(['form']);
        $data = [
            'page' => 'employee',
            'validation' => Services::validation(),
            'user' => $this->userModel->where(['id' => $id])->first(),
            'job' => $this->jobModel->where(['user_id' => $id])->findAll(),
        ];

        echo view('layouts/pages/admin/employee/edit', $data);
    }

    public function update($id)
    {
        helper(['form']);
        $rules = [
            'nik' => 'required|min_length[16]|max_length[16]',
            'fullname' => 'required|min_length[2]|max_length[50]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email',
            'date_of_birth' => 'required',
            'place_of_birth' => 'required',
            'gender' => 'required',
            'age' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
            'password' => 'required',
            'position' => 'required',
        ];

        if ($this->validate($rules)) {
            $data = [
                'id' => $id,
                'nik' => $this->request->getVar('nik'),
                'fullname' => $this->request->getVar('fullname'),
                'email' => $this->request->getVar('email'),
                'date_of_birth' => $this->request->getVar('date_of_birth'),
                'place_of_birth' => $this->request->getVar('place_of_birth'),
                'gender' => $this->request->getVar('gender'),
                'age' => $this->request->getVar('age'),
                'phone_number' => $this->request->getVar('phone_number'),
                'address' => $this->request->getVar('address'),
                'position' => $this->request->getVar('position'),
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $this->userModel->save($data);
            return redirect()->to("/admin/employee");
        } else {
            $validation = Services::validation();
            return redirect()->to('/admin/employee/edit/' . $id)->withInput()->with('validation', $validation);
        }
    }

    public function detail($id)
    {
        helper(['form']);
        $data = [
            'page' => 'employee',
            'validation' => Services::validation(),
            'user' => $this->userModel->where(['id' => $id])->first(),
            'job' => $this->jobModel->where(['user_id' => $id])->findAll(),
        ];

        echo view('layouts/pages/admin/employee/detail', $data);
    }
}