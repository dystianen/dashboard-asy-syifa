<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GalleryModel;
use function mkdir;

class GalleryController extends BaseController
{
    protected $galleryModel;
    protected $session;
    public function __construct()
    {
        $this->galleryModel = new GalleryModel();
        $this->session = session();
    }

    public function index()
    {
        $galleries = $this->galleryModel->findAll();
        $data = [
            'page' => 'gallery',
            'galleries' => $galleries,
        ];

        return view('layouts/pages/gallery/index', $data);
    }

    public function ListGalleryApi()
    {
        $galleries = $this->galleryModel->findAll();
        $data = [
            "status" => 200,
            "data" => $galleries,
        ];
        return $this->response->setJSON($data);
    }

    public function uploadGallery()
    {
        return $this->upload($this->galleryModel, "gallery");
    }

    public function delete($id)
    {
        $this->galleryModel->where(['galleries_id' => $id])->delete();
        session()->setFlashdata('success_gallery', 'Delete Image successfully.');
        return redirect()->to('/gallery');
    }
}
