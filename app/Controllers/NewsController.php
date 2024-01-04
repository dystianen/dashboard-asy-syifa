<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NewsModel;
use function mkdir;

class NewsController extends BaseController
{
    protected $newsModel;
    protected $session;
    public function __construct()
    {
        $this->newsModel = new NewsModel();
        $this->session = session();
    }

    public function index()
    {
        $news = $this->newsModel->findAll();
        $data = [
            'page' => 'news',
            'news' => $news,
        ];

        return view('layouts/pages/news/index', $data);
    }

    public function save()
    {
        $file = $this->request->getFile("file");
        if ($file->isValid()) {
            $destinationFolder = ROOTPATH . 'public/assets/media/news';

            if (!is_dir($destinationFolder)) {
                mkdir($destinationFolder, 0777, true);
            }
            $file_name = $file->getClientName();
            $file->move($destinationFolder, $file_name);

            $data = [
                "title" => $this->request->getVar('title'),
                "file_name" => $file_name,
                "file_type" => $file->getClientMimeType(),
                "file_path" => 'assets/media/news/' . $file_name,
            ];
            $this->newsModel->insert($data);
        }

        session()->setFlashdata('success_news', 'Upload images is successfully!');
        return redirect()->to(site_url('/news'));
    }

    public function delete($id)
    {
        $this->newsModel->where(['news_id' => $id])->delete();
        session()->setFlashdata('success_news', 'Delete Image successfully.');
        return redirect()->to('/news');
    }
}
