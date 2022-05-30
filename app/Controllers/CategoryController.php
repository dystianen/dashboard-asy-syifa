<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use Config\Services;

class CategoryController extends BaseController
{

    protected $categoryModel;

    public function __construct()
    {
        $this->categoryModel = new CategoryModel();

        if (session()->get('level') != "admin") {
            echo 'Access denied';
            exit;
        }
    }

    public function index()
    {
        $categories = $this->categoryModel->findAll();
        $data = [
            'page' => 'category',
            'categories' => $categories
        ];

        $data['data'] = $data;

        return view('layouts/pages/admin/category/index', $data);
    }

    public function create()
    {
        helper(['form']);
        $data = [
            'page' => 'category',
            'validation' => Services::validation(),
        ];

        echo view('layouts/pages/admin/category/create', $data);
    }

    public function save()
    {
        // $content    = nl2br($this->request->getPost('content'));
        helper(['form']);
        $rules = [
            'name' => 'required|min_length[1]|is_unique[categories.name]',
        ];

        if ($this->validate($rules)) {
            $data = [
                'name' => $this->request->getVar('name'),
                'slug' => url_title($this->request->getVar('name'), '-', TRUE),
                'created_at' => date('Y-m-d', strtotime('+1 days')),
            ];

            $this->categoryModel->save($data);
            return redirect()->to("/admin/category");
        } else {
            $validation = Services::validation();
            return redirect()->to('/admin/category/form')->withInput()->with('validation', $validation);
        }
    }

    public function detail($id)
    {
        helper(['form']);
        $data = [
            'page' => 'category',
            'validation' => Services::validation(),
            'category' => $this->categoryModel->where(['id' => $id])->first(),
        ];

        echo view('layouts/pages/admin/category/detail', $data);
    }

    public function edit($id)
    {
        helper(['form']);
        $data = [
            'page' => 'category',
            'validation' => Services::validation(),
            'category' => $this->categoryModel->where(['id' => $id])->first(),
        ];

        echo view('layouts/pages/admin/category/edit', $data);
    }

    public function update($id)
    {
        helper(['form']);
        $rules = [
            'name' => 'required|min_length[1]',
        ];

        if ($this->validate($rules)) {
            $data = [
                'id' => $id,
                'name' => $this->request->getVar('name'),
                'slug' => url_title($this->request->getVar('name'), '-', TRUE),
                'updated_at' => date('Y-m-d', strtotime('+1 days'))
            ];

            $this->categoryModel->save($data);
            return redirect()->to("/admin/category");
        } else {
            $validation = Services::validation();
            return redirect()->to('/admin/category/edit/' . $id)->withInput()->with('validation', $validation);
        }
    }

    public function delete($id)
    {
        $this->categoryModel->delete($id);
        return redirect()->to('/admin/category');
    }
}