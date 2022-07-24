<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EvaluationModel;
use App\Models\JobModel;
use App\Models\UserModel;
use Config\Services;

class EvaluationController extends BaseController
{
    protected $evaluationModel, $userModel, $jobModel;

    public function __construct()
    {
        $this->evaluationModel = new EvaluationModel();
        $this->userModel = new UserModel();
        $this->jobModel = new JobModel();
        helper(['form']);

        if (session()->get('level') != "admin") {
            echo 'Access denied';
            exit;
        }
    }

    public function index()
    {
        $data = [
            'page' => 'evaluation',
            'evaluation' => $this->evaluationModel
                ->join('users', 'users.userId = evaluations.user_id')
                ->get()
                ->getResultArray()
        ];

        echo view('layouts/pages/admin/evaluation/index', $data);
    }

    public function create()
    {
        $dataUser = $this->userModel->findAll();
        $dataJob = $this->jobModel->findAll();
        $data = [
            'page' => 'evaluation',
            'user' => $dataUser,
            'job' => $dataJob,
            'validation' => Services::validation(),
        ];

        echo view('layouts/pages/admin/evaluation/create', $data);
    }

    public function createSave()
    {
        $rules = [
            'user_id' => 'required',
            'job_id' => 'required',
            'disiplin' => 'required',
            'loyalitas'   => 'required',
            'kerjasama'   => 'required',
            'perilaku'   => 'required',
            'value_job_type' => 'required',
        ];

        if ($this->validate($rules)) {
            // $total = $this->request->getVar('disiplin') + $this->request->getVar('loyalitas') + $this->request->getVar('kerjasama') + $this->request->getVar('perilaku') + '60';
            $data = [
                'user_id' => $this->request->getVar('user_id'),
                'job_id' => $this->request->getVar('job_id'),
                'disiplin' => $this->request->getVar('disiplin'),
                'loyalitas' => $this->request->getVar('loyalitas'),
                'kerjasama' => $this->request->getVar('kerjasama'),
                'perilaku' => $this->request->getVar('perilaku'),
                'value_job_type' => $this->request->getVar('type'),
                'total_sikap' => $this->request->getVar('total_sikap'),
                'total_percentage_sikap' => $this->request->getVar('total_percentage_sikap'),
                'total_working_result' => $this->request->getVar('total_working_result'),
                'total_percentage_working_result' => $this->request->getVar('total_percentage_working_result'),
                'total' => $this->request->getVar('total'),
                'predikat' => $this->request->getVar('predikat'),
                'created_at' => date('Y-m-d H:i:s'),
            ];

            dd($data);
            $this->evaluationModel->save($data);
            session()->setFlashdata('success_evaluation', 'Create Evaluation successfully.');
            return redirect()->to("/admin/evaluation");
        } else {
            $validation = Services::validation();
            return redirect()->to('/admin/evaluation/create')->withInput()->with('validation', $validation);
        }
    }

    public function edit($id)
    {
        $dataEvaluation = $this->evaluationModel->where(['evaluationId' => $id])->first();
        $dataUser = $this->userModel->findAll();
        $data = [
            'page' => 'evaluation',
            'evaluation' => $dataEvaluation,
            'user' => $dataUser,
            'validation' => Services::validation(),
        ];

        echo view('layouts/pages/admin/evaluation/edit', $data);
    }

    public function editSave($id)
    {
        $rules = [
            'user_id' => 'required',
            'disiplin' => 'required',
            'loyalitas'   => 'required',
            'kerjasama'   => 'required',
            'perilaku'   => 'required',
        ];

        if ($this->validate($rules)) {
            $total = $this->request->getVar('disiplin') + $this->request->getVar('loyalitas') + $this->request->getVar('kerjasama') + $this->request->getVar('perilaku') + '60';
            $data = [
                'user_id' => $this->request->getVar('user_id'),
                'disiplin' => $this->request->getVar('disiplin'),
                'loyalitas' => $this->request->getVar('loyalitas'),
                'kerjasama' => $this->request->getVar('kerjasama'),
                'perilaku' => $this->request->getVar('perilaku'),
                'omseting' => '60',
                'total' => $total,
                'created_at' => date('Y-m-d H:i:s'),
            ];

            $this->evaluationModel->replace($data);
            session()->setFlashdata('success_evaluation', 'Update Performance Employee successfully.');
            return redirect()->to("/admin/evaluation");
        } else {
            $validation = Services::validation();
            return redirect()->to('/admin/evaluation/edit')->withInput()->with('validation', $validation);
        }
    }

    public function detail($id)
    {
        $dataPerformance = $this->evaluationModel->where(['evaluationId' => $id])->first();
        $dataUser = $this->userModel->findAll();
        $data = [
            'page' => 'evaluation',
            'evaluation' => $dataPerformance,
            'user' => $dataUser,
        ];

        echo view('layouts/pages/admin/evaluation/detail', $data);
    }

    public function delete($id)
    {
        $this->evaluationModel->where(['evaluationId' => $id])->delete();
        session()->setFlashdata('success_evaluation', 'Delete Evaluation successfully.');
        return redirect()->to('/admin/evaluation');
    }
}
