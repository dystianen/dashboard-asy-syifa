<?php

namespace App\Controllers;

use App\Models\JobModel;

class Job extends BaseController
{
    public function index()
    {
        echo view('layouts/pages/admin/job/index');
    }

    public function store()
    {
        helper(['form']);
        $rules = [
            'user_id'       => 'required',
            'type_of_work'  => 'required',
            'description'   => 'required',
            'point'         => 'required',
            'is_completed'  => 'required',
        ];
          
        if ($this->validate($rules)) {
            $jobModel = new JobModel();

            $data = [
                'user_id'       => $this->request->getVar('user_id'),
                'type_of_work'  => $this->request->getVar('type_of_work'),
                'description'   => $this->request->getVar('description'),
                'point'         => $this->request->getVar('point'),
                'is_completed'  => $this->request->getVar('is_completed'),
            ];

            $jobModel->save($data);

            // TBD
            return redirect()->to("/job/create");
        } else {
            $data['validation'] = $this->validator;

            // TBD
            echo view("/job/create", $data);
        }
    }
    
    public function show() 
    {
        // Your Code...    
    }

    public function edit() 
    {
        // Your Code...    
    }

    public function update() 
    {
        // Your Code...    
    }

    public function destroy() 
    {
        // Your Code...    
    }
}