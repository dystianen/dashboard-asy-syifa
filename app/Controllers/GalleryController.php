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

    public function save()
    {
        foreach ($this->request->getFileMultiple("file") as $file) {
            if ($file->isValid()) {
                $destinationFolder = ROOTPATH . 'public/assets/media/galleries';

                if (!is_dir($destinationFolder)) {
                    mkdir($destinationFolder, 0777, true);
                }
                $file_name = $file->getClientName();
                $file->move($destinationFolder, $file_name);

                $data = [
                    "file_name" => $file_name,
                    "file_type" => $file->getClientMimeType(),
                    "file_path" => 'assets/media/galleries/' . $file_name,
                ];
                $this->galleryModel->insert($data);
            }
        }

        session()->setFlashdata('success_gallery', 'Upload images is successfully!');
        return redirect()->to(site_url('/gallery'));
    }

    public function delete($id)
    {
        $this->galleryModel->where(['galleries_id' => $id])->delete();
        session()->setFlashdata('success_gallery', 'Delete Image successfully.');
        return redirect()->to('/gallery');
    }
}
