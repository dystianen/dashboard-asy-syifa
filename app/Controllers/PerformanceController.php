<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PerformanceModel;
use App\Models\UserModel;
use Config\Services;

class PerformanceController extends BaseController
{
    protected $performanceModel, $userModel;

    public function __construct()
    {
        $this->performanceModel = new PerformanceModel();
        $this->userModel = new UserModel();
        helper(['form']);

        if (session()->get('level') != "admin") {
            echo 'Access denied';
            exit;
        }
    }

    public function index()
    {
        $performance = $this->performanceModel->findAll();
        $data = [
            'page' => 'performance',
            'performance' => $performance,
        ];

        echo view('layouts/pages/admin/performance/index', $data);
    }

    public function create()
    {
        $dataUser = $this->userModel->findAll();
        $data = [
            'page' => 'performance',
            'user' => $dataUser,
            'validation' => Services::validation(),
        ];

        echo view('layouts/pages/admin/performance/create', $data);
    }

    public function createSave()
    {
        $rules = [
            'user_id'       => 'required',
            'description'  => 'required',
//            'score'   => 'required',
        ];

        if ($this->validate($rules)) {
            $data = [
                'user_id'       => $this->request->getVar('user_id'),
                'description'   => $this->request->getVar('description'),
                'score'         => 'A',
//                'score'         => $this->request->getVar('score'),
                'created_at'  => date('Y-m-d H:i:s'),
            ];

            $this->performanceModel->save($data);
            session()->setFlashdata('success_performance', 'Create Performance Employee successfully.');
            return redirect()->to("/admin/performance");
        } else {
            $validation = Services::validation();
            return redirect()->to('/admin/performance/create')->withInput()->with('validation', $validation);
        }
    }
}
