<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AttendanceModel;

class AttedanceController extends BaseController
{
    public function index()
    {
        echo view('layouts/pages/attedance/index');
    }

    public function store()
    {
        helper(['form']);
        $rules = [
            'user_id'       => 'required',
            'is_logged_in'  => 'required',
            'description'   => 'required',
            'file'          => 'required',
        ];
          
        if ($this->validate($rules)) {
            $attedanceModel = new AttendanceModel();

            $data = [
                'user_id'       => $this->request->getVar('user_id'),
                'is_logged_in'  => $this->request->getVar('is_logged_in'),
                'description'   => $this->request->getVar('description'),
                'file'          => $this->request->getVar('file'),
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