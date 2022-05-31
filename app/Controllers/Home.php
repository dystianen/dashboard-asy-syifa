<?php

namespace App\Controllers;

use App\Models\AttendanceModel;
use App\Models\JobModel;
use App\Models\UserModel;
use DateTime;

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
        // Get Today Date + 1
        $todayPlusOne = date('Y-m-d H:i:s');
        
        $data = [
            // Sidebar
            'page' => 'dashboard',

            // Employees
            'task_completed' => $this
            ->jobModel
            ->where("is_completed", 1)
            ->where('DATE(created_at)',$todayPlusOne)
            ->countAllResults(),

            'task_unfinished' => $this
            ->jobModel
            ->where("is_completed", 0)
            ->where('DATE(created_at)',$todayPlusOne)
            ->countAllResults(),

            'total_employees' => $this
            ->userModel
            ->countAllResults(),

            // Attendances
            'employee_presence' => $this
            ->attedanceModel
            ->where("category", "Hadir")
            ->where('DATE(created_at)',$todayPlusOne)
            ->countAllResults(),

            'employee_sick' => $this
            ->attedanceModel
            ->where("category", "Sakit")
            ->where('DATE(created_at)',$todayPlusOne)
            ->countAllResults(),
        ];
        
        echo view('layouts/pages/admin/dashboard/index', $data);
    }
}