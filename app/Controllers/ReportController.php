<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ReportModel;
use App\Models\UserModel;
use Config\Services;

class ReportController extends BaseController
{
    protected $reportModel, $userModel;

    public function __construct()
    {
        $this->reportModel = new ReportModel();
        $this->userModel = new UserModel();
        helper(['form']);
    }

    public function index()
    {
        $data = [
            'page' => 'report',
            'report' => $this->reportModel->join('users', 'users.userId = reports.user_id')->findAll(),
        ];

        echo view('layouts/pages/admin/report/index', $data);
    }

    public function createSave()
    {
        $rules = [
            'description' => 'required',
        ];

        if ($this->validate($rules)) {
            $data = [
                'user_id' => session()->get('id'),
                'description' => $this->request->getVar('description'),
                'created_at' => date('Y-m-d H:i:s'),
            ];

            $this->reportModel->save($data);
            session()->setFlashdata('index', 'Report successfully!');
            return redirect()->to("/user");
        }
    }

    public function detail($id)
    {
        $dataReport = $this->reportModel
            ->where(['reportId' => $id])
            ->join('users', 'users.userId = reports.user_id')
            ->first();

//        dd($dataReport);
        $data = [
            'page' => 'performance',
            'report' => $dataReport,
        ];

        echo view('layouts/pages/admin/report/detail', $data);
    }

    public function delete($id)
    {
        $this->performanceModel->where(['performanceId' => $id])->delete();
        session()->setFlashdata('success_performance', 'Delete Performance Employee successfully.');
        return redirect()->to('/admin/performance');
    }
}
