<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ActivityModel;
use CodeIgniter\API\ResponseTrait;

class ActivityController extends BaseController
{
    use ResponseTrait;
    protected $activityModel;
    protected $session;
    public function __construct()
    {
        $this->activityModel = new ActivityModel();
        $this->session = session();
    }

    public function index()
    {
        $activity = $this->activityModel->findAll();
        $data = [
            'page' => 'activity',
            'activity' => $activity,
        ];

        return view('layouts/pages/activity/index', $data);
    }

    public function ListActivityApi()
    {
        $activity = $this->activityModel->findAll();
        $data = [
            'status' => 200,
            'data' => $activity,
        ];

        return $this->respond($data);
    }

    public function uploadActivity()
    {
        return $this->upload($this->activityModel, "activity");
    }

    public function delete($id)
    {
        $this->activityModel->where(['activities_id' => $id])->delete();
        session()->setFlashdata('success_activity', 'Delete Image successfully.');
        return redirect()->to('/activity');
    }
}
