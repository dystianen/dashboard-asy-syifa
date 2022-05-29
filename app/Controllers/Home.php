<?php

namespace App\Controllers;

use App\Models\AttendanceModel;
use App\Models\JobModel;
use App\Models\UserModel;

class Home extends BaseController
{
    protected $jobModel, $userModel, $attedanceModel;

    public function __construct()
    {
        $this->jobModel = new JobModel();
        $this->userModel = new UserModel();
        $this->attedanceModel = new AttendanceModel();

        if (session()->get('level') != "admin") {
            echo 'Access denied';
            exit;
        }
    }

    public function index()
    {
        $data = [
            // Sidebar
            'page' => 'dashboard',

            // Employees
            'task_completed' => $this->jobModel->where("is_completed", 1)->countAllResults(),
            'task_unfinished' => $this->jobModel->where("is_completed", 0)->countAllResults(),
            'total_employees' => $this->userModel->countAllResults(),

            // Attendances
            'employee_presence' => $this->attedanceModel->where("category", "Hadir")->countAllResults(),
            'employee_sick' => $this->attedanceModel->where("category", "Sakit")->countAllResults(),
        ];

        echo view('layouts/pages/admin/dashboard/index', $data);
    }
}