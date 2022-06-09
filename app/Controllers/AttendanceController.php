<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AttendanceModel;
use App\Models\CategoryModel;
use CodeIgniter\Config\Services;

class AttendanceController extends BaseController
{
    protected $attendanceModel, $categoryModel, $session;
    public function __construct()
    {
        helper(['form']);
        $this->attendanceModel = new AttendanceModel();
        $this->categoryModel = new CategoryModel();
        $this->session = session();
    }

    public function index()
    {
        $attedance = $this->attendanceModel
        ->join('users', 'users.userId = attendances.user_id', 'left')
        ->findAll();

        $data = [
            'page' => 'attendance',
            'attendance' => $attedance,
        ];

        // var_dump($attedanceUser);
        echo view('layouts/pages/attendance/index', $data);
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
            $data = [
                'user_id' => $this->request->getVar('user_id'),
                'is_logged_in' => $this->request->getVar('is_logged_in'),
                'description' => $this->request->getVar('description'),
                'file' => $this->request->getVar('file'),
                'created_at' => date('Y-m-d H:i:s'),
            ];

            $this->attendanceModel->save($data);

            // TBD
            return redirect()->to("/attendance/create");
        } else {
            $data['validation'] = $this->validator;

            // TBD
            echo view("/attendance/create", $data);
        }
    }

    public function permission()
    {
        $data = [
            'validation' => Services::validation(),
            'category' => $this->categoryModel->findAll()
        ];

        echo view('layouts/pages/User/permission/index', $data);
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

    public function scannerSave()
    {
        helper(['form']);
        $data = [
            'user_id' => session()->get('id'),
            'is_logged_in' => TRUE,
            'category' => 'hadir',
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->attendanceModel->save($data);

        return redirect()->to('/user');
    }
}
