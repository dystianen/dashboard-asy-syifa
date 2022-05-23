<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AttendanceModel;

class AttedanceController extends BaseController
{
    public function __construct()
    {
        if (session()->get('level') != "admin") {
            echo 'Access denied';
            exit;
        }
    }

    public function index()
    {
        echo view('layouts/pages/attedance/index');
    }

    public function store()
    {
        helper(['form']);
        $rules = [
            'user_id' => 'required',
            'is_logged_in' => 'required',
            'description' => 'required',
            'file' => 'required',
        ];

        if ($this->validate($rules)) {
            $attedanceModel = new AttendanceModel();

            $data = [
                'user_id' => $this->request->getVar('user_id'),
                'is_logged_in' => $this->request->getVar('is_logged_in'),
                'description' => $this->request->getVar('description'),
                'file' => $this->request->getVar('file'),
            ];

            $attedanceModel->save($data);

            // TBD
            return redirect()->to("/attedance/create");
        } else {
            $data['validation'] = $this->validator;

            // TBD
            echo view("/attedance/create", $data);
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
            'page' => 'employee',
            'validation' => Services::validation(),
            'user' => $this->userModel->where(['id' => $id])->first(),
        ];

        echo view('layouts/pages/admin/employee/detail', $data);
    }

}