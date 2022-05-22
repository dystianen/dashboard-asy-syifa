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

    // Detail Page
    public function show() 
    {
        // Your Code...    
    }

    // Edit Page
    public function edit() 
    {
        // Your Code...    
    }

    // Update Function
    public function update() 
    {
        $this->contact->update($id, [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
        ]);
        return redirect('contact')->with('success', 'Data Updated Successfully'); 
    }

    // Delete or Soft Delete Function
    public function destroy() 
    {
        $this->contact->delete($id);
        return redirect('contact')->with('success', 'Data Deleted Successfully');
    }
    
}