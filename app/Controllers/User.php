<?php

namespace App\Controllers;

use App\Models\JobModel;
use App\Models\UserModel;
use CodeIgniter\Config\Services;

class User extends BaseController
{
    protected $userModel, $jobModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->jobModel = new JobModel();
        if (session()->get('level') != "employee") {
            echo 'Access denied';
            exit;
        }
    }

    public function index()
    {
        echo view('layouts/pages/User/index');
    }

    public function profile()
    {
        helper(['form']);
        $id = session()->get('id');
        $data = [
            'user' => $this->userModel->where(['id' => $id])->first(),
        ];
        return view('layouts/pages/User/profile/index', $data);
    }

    public function absent()
    {
        echo view('layouts/pages/User/absent/index');
    }

    public function report()
    {
        echo view('layouts/pages/User/report/index');
    }

    public function task()
    {
        $jobModel = new JobModel();
        $userId = session()->get('id');
        $job = $jobModel->where('user_id', $userId)->findAll();
        $data = [
            'page' => 'job',
            'job' => $job
        ];

        echo view('layouts/pages/User/task/index', $data);
    }

    public function TaskDetail($id)
    {
        $data = [
            'job' => $this->jobModel->where(['id' => $id])->first(),
        ];
        echo view('layouts/pages/User/task/detail', $data);
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
