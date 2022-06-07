<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AttendanceModel;
use App\Models\CategoryModel;
use CodeIgniter\Config\Services;

class AttendanceController extends BaseController
{
    protected $attendanceModel, $categoryModel;
    public function __construct()
    {
        helper(['form']);
        $this->attendanceModel = new AttendanceModel();
        $this->categoryModel = new CategoryModel();
    }

    public function index()
    {
        $data = [
            'page' => 'attedance',
            'attedance' => $this->attendanceModel->findAll()
        ];

        echo view('layouts/pages/attedance/index', $data);
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
                'created_at' => date('Y-m-d H:i:s'),
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
                'updated_at' => date('Y-m-d H:i:s'),
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

    public function permission()
    {
        $data = [
            'validation' => Services::validation(),
            'category' => $this->categoryModel->findAll()
        ];

        echo view('layouts/pages/User/permission', $data);
    }

    public function permissionSave()
    {
        helper(['form']);
        $rules = [
            'category' => 'required',
            'description' => 'required',
            'file' => 'required',
        ];

        if ($this->validate($rules)) {
            $data = [
                'user_id' => session()->get('id'),
                'category' => $this->request->getVar('category'),
                'description' => $this->request->getVar('description'),
                'file' => $this->request->getVar('file'),
                'is_logged_in' => TRUE,
                'created_at' => date('Y-m-d H:i:s')
            ];

            $this->attendanceModel->save($data);

            // TBD
            return redirect()->to('/user/absent');
        } else {
            $validation = Services::validation();
            return redirect()->to('/user/permission')->withInput()->with('validation', $validation);
        }
    }

    public function scanner()
    {
        echo view('layouts/pages/User/scan/index');
    }

    public function scannerForm()
    {
        echo view('layouts/pages/User/scan/formSubmit');
    }

    public function scannerSave()
    {
        helper(['form']);
        $data = [
            'user_id' => session()->get('id'),
            'is_logged_in' => TRUE,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->attendanceModel->save($data);

        $this->session->setFlashdata('success_scan');
        return redirect()->to('/user');
    }
}