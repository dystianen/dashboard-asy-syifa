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

    public function create()
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
            'is_completed'  => 'required',
        ];

        if ($this->validate($rules)) {
            $jobModel = new JobModel();

            $data = [
                'user_id'       => $this->request->getVar('user_id'),
                'type_of_work'  => $this->request->getVar('type_of_work'),
                'description'   => $this->request->getVar('description'),
                'point'         => $this->request->getVar('point'),
                'is_completed'  => $this->request->getVar('is_completed'),
            ];

            $jobModel->save($data);

            // TBD
            return redirect()->to("/job/create");
        } else {
            $validation = Services::validation();
            return redirect()->to('/admin/job/create')->withInput()->with('validation', $validation);
        }
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
