<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HeroModel;
use Config\Services;
use function mkdir;

class HeroController extends BaseController
{
    protected $heroModel;
    protected $session;
    public function __construct()
    {
        $this->heroModel = new HeroModel();
        $this->session = session();
    }

    public function index()
    {
        $heroes = $this->heroModel->findAll();
        $data = [
            'page' => 'hero',
            'heroes' => $heroes,
        ];

        return view('layouts/pages/hero/index', $data);
    }

    public function save()
    {
        foreach ($this->request->getFileMultiple("file") as $file) {
            if ($file->isValid()) {
                $destinationFolder = ROOTPATH . 'public/assets/media/heroes';

                if (!is_dir($destinationFolder)) {
                    mkdir($destinationFolder, 0777, true);
                }
                $file_name = $file->getClientName();
                $file->move($destinationFolder, $file_name);

                $data = [
                    "file_name" => $file_name,
                    "file_type" => $file->getClientMimeType(),
                    "file_path" => 'assets/media/heroes/' . $file_name,
                ];
                $this->heroModel->insert($data);
            }
        }

        session()->setFlashdata('success_hero', 'Upload images is successfully!');
        return redirect()->to(site_url('/hero'));
    }

    public function delete($id)
    {
        $this->heroModel->where(['heroes_id' => $id])->delete();
        session()->setFlashdata('success_hero', 'Delete Image successfully.');
        return redirect()->to('/hero');
    }
}
