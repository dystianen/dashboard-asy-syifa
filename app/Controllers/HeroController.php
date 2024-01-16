<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\HeroModel;
use Aws\S3\Exception\S3Exception;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\Files\File;
use function mkdir;
use Aws\S3\S3Client;

class HeroController extends BaseController
{
    use ResponseTrait;
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

    public function ListHeroApi()
    {
        $heroes = $this->heroModel->findAll();
        $response = [
            'statusCode' => 200,
            'data' => $heroes,
        ];

        return $this->respond($response);
    }

    public function uploadHero()
    {
        return $this->upload($this->heroModel, "hero");
    }

    public function delete($id)
    {
        $this->heroModel->where(['heroes_id' => $id])->delete();
        session()->setFlashdata('success_hero', 'Delete Image successfully.');
        return redirect()->to('/hero');
    }
}
