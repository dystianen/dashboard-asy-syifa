<?php

namespace App\Controllers;

use App\Models\JobModel;
use App\Models\UserModel;
use Config\Services;

class Job extends BaseController
{
    protected $jobModel;

    public function __construct()
    {
        $this->jobModel = new JobModel();

        if (session()->get('level') != "admin") {
            echo 'Access denied';
            exit;
        }
    }

    public function index()
    {
        $job = $this->jobModel->findAll();
        $data = [
            'page' => 'job',
            'job' => $job
        ];

        echo view('layouts/pages/admin/job/index', $data);
    }

    public function form()
    {
        helper(['form']);
        $userModel = new UserModel();
        $dataUser = $userModel->findAll();
        $data = [
            'page' => 'job',
            'validation' => Services::validation(),
            'user' => $dataUser
        ];

        echo view('layouts/pages/admin/job/create', $data);
    }

    public function save()
    {
        helper(['form']);
        $rules = [
            'user_id'       => 'required',
            'type_of_work'  => 'required',
            'description'   => 'required',
            'point'         => 'required',
        ];

        if ($this->validate($rules)) {
            $jobModel = new JobModel();

            $data = [
                'user_id'       => $this->request->getVar('user_id'),
                'type_of_work'  => $this->request->getVar('type_of_work'),
                'description'   => $this->request->getVar('description'),
                'point'         => $this->request->getVar('point'),
                'is_completed'  => 0,
                'created_at'  => date("Y-m-d", time()),
            ];

            $jobModel->save($data);

            return redirect()->to("/job");
        } else {
            $validation = Services::validation();
            return redirect()->to('/admin/job/form')->withInput()->with('validation', $validation);
        }
    }

    public function delete($id)
    {
        $this->jobModel->delete($id);
        return redirect()->to('/admin/job');
    }

    public function edit($id)
    {
        helper(['form']);
        $data = [
            'page' => 'employee',
            'validation' => Services::validation(),
            'user' => $this->userModel->where(['id' => $id])->first(),
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
            'page' => 'job',
            'validation' => Services::validation(),
            'job' => $this->jobModel->getJob($id),
        ];

        // var_dump();

        echo view('layouts/pages/admin/job/detail', $data);
    }
}