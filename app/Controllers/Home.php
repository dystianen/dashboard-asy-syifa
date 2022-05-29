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

        $date = new DateTime("now");
        $curr_date = $date->format('Y-m-d');
        // $datePlusOne = strtotime("+1 day", $curr_date);

        $NewDate = date('Y-m-d', strtotime('+1 days'));

        $data = [
            // Sidebar
            'page' => 'dashboard',

            // Employees
            'task_completed' => $this
            ->jobModel
            ->where("is_completed", 1)
            ->where('DATE(created_at)',$NewDate)
            ->countAllResults(),

            'task_unfinished' => $this
            ->jobModel
            ->where("is_completed", 0)
            ->where('DATE(created_at)',$NewDate)
            ->countAllResults(),

            'total_employees' => $this
            ->userModel
            ->countAllResults(),

            // Attendances
            'employee_presence' => $this
            ->attedanceModel
            ->where("category", "Hadir")
            ->where('DATE(created_at)',$NewDate)
            ->countAllResults(),

            'employee_sick' => $this
            ->attedanceModel
            ->where("category", "Sakit")
            ->where('DATE(created_at)',$NewDate)
            ->countAllResults(),
        ];

        // var_dump($curr_date, $NewDate);
        // var_dump($NewDate);
        echo view('layouts/pages/admin/dashboard/index', $data);
    }
}