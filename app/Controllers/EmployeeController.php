<?php

namespace App\Controllers;

use App\Models\JobModel;
use App\Models\UserModel;
use Config\Services;

class EmployeeController extends BaseController
{
    protected $userModel, $jobModel, $session;
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
            'phone_number' => 'required',
            'position' => 'required',
        ];

        if ($this->validate($rules)) {
            $data = [
                'nik' => $this->request->getVar('nik'),
                'fullname' => $this->request->getVar('fullname'),
                'email' => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'date_of_birth' => $this->request->getVar('date_of_birth'),
                'phone_number' => $this->request->getVar('phone_number'),
                'position' => $this->request->getVar('position'),
                'level' => 'employee',
                'created_at' => date('Y-m-d H:i:s'),
            ];

            $this->userModel->save($data);
            session()->setFlashdata('success', 'Create Employee successfully.');
            return redirect()->to("/admin/employee");
        } else {
            $validation = Services::validation();
            return redirect()->to('/admin/employee/form')->withInput()->with('validation', $validation);
        }
    }

    public function edit($id)
    {
        helper(['form']);
        $data = [
            'page' => 'employee',
            'validation' => Services::validation(),
            'user' => $this->userModel->where(['userId' => $id])->first(),
        ];

        echo view('layouts/pages/admin/employee/edit', $data);
    }

    public function update($id)
    {
        helper(['form']);
        $currentData = $this->userModel->where(['userId' => $id])->first();
        $rules = [
            'nik' => 'required|min_length[16]|max_length[16]',
            'fullname' => 'required|min_length[2]|max_length[50]',
            'email' => 'required|min_length[4]|max_length[100]|valid_email',
            'date_of_birth' => 'required',
            'position' => 'required',
            'phone_number' => 'required',
        ];

        if ($this->validate($rules)) {
            $data = [
                'userId' => $id,
                'nik' => $this->request->getVar('nik'),
                'fullname' => $this->request->getVar('fullname'),
                'email' => $this->request->getVar('email'),
                'date_of_birth' => $this->request->getVar('date_of_birth'),
                'phone_number' => $this->request->getVar('phone_number'),
                'position' => $this->request->getVar('position'),
                'created_at' => $currentData['created_at'],
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $this->userModel->replace($data);
            session()->setFlashdata('success', 'Update Employee successfully.');
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
            'user' => $this->userModel->where(['userId' => $id])->first(),
        ];

        echo view('layouts/pages/admin/employee/detail', $data);
    }

    public function delete($id)
    {
        $queryUserExist = $this->userModel->find();
        $queryJobExistInUser = $this->jobModel->findJobByUserId($id);

        if ($queryUserExist) {
            if ($queryJobExistInUser) {
                foreach ($queryJobExistInUser as $job) {
                    $this->jobModel->delete($job);
                }
                session()->setFlashdata('success', 'Delete Employee successfully.');
                return redirect()->to('/admin/employee');
            } else {
                $this->userModel->delete($id);
                session()->setFlashdata('success', 'Delete Employee successfully.');
                return redirect()->to('/admin/employee');
            }
            $this->userModel->delete($id);
        } else {
            return "User Not Found!";
            die();
        }
    }
}
