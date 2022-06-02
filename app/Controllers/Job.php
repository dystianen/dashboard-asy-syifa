<?php

namespace App\Controllers;

use App\Models\JobModel;
use App\Models\UserModel;
use Config\Services;

class Job extends BaseController
{
    protected $jobModel, $userModel;

    public function __construct()
    {
        $this->jobModel = new JobModel();
        $this->userModel = new UserModel();
        $this->session = session();

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
            'job' => $job,
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
            'user' => $dataUser,
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
                'created_at'  => date('Y-m-d H:i:s'),
            ];

            $jobModel->save($data);
            $this->session->setFlashdata('success_job', 'Create Job successfully.');
            return redirect()->to("/job");
        } else {
            $validation = Services::validation();
            return redirect()->to('/admin/job/form')->withInput()->with('validation', $validation);
        }
    }

    public function delete($id)
    {
        $this->jobModel->delete($id);
        $this->session->setFlashdata('success_job', 'Delete Job successfully.');
        return redirect()->to('/admin/job');
    }

    public function edit($id)
    {
        helper(['form']);
        $data = [
            'page' => 'job',
            'validation' => Services::validation(),
            'job' => $this->jobModel->getJob($id),
            'user' => $this->userModel->findAll(),
            'job_id' => $id
        ];

        echo view('layouts/pages/admin/job/edit', $data);
    }

    public function update($id)
    {
        helper(['form']);
        $rules = [
            'user_id'       => 'required',
            'type_of_work'  => 'required',
            'description'   => 'required',
            'point'         => 'required',
        ];

        if ($this->validate($rules)) {
            $data = [
                'id'            => $id,
                'user_id'       => $this->request->getVar('user_id'),
                'type_of_work'  => $this->request->getVar('type_of_work'),
                'description'   => $this->request->getVar('description'),
                'point'         => $this->request->getVar('point'),
                'updated_at'    => date('Y-m-d H:i:s')
            ];

            $this->jobModel->save($data);
            $this->session->setFlashdata('success_job', 'Update Job successfully.');
            return redirect()->to("/admin/job");
        } else {
            $validation = Services::validation();
            return redirect()->to('/admin/job/edit/' . $id)->withInput()->with('validation', $validation);
        }
    }

    public function detail($id)
    {
        helper(['form']);
        $data = [
            'page' => 'job',
            'validation' => Services::validation(),
            'job' => $this->jobModel->getJob($id),
            'job_id' => $id
        ];

        echo view('layouts/pages/admin/job/detail', $data);
    }
}