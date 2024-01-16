<?php

namespace App\Controllers;

use Aws\S3\Exception\S3Exception;
use Aws\S3\S3Client;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
        session();
    }

    function uploadFile($file, $model, $type)
    {
        $image = \Config\Services::image();
        if ($file->isValid()) {
            if (!$file->hasMoved()) {
                $bucket = 'asy-syifa';
                $primaryPath = 'https://nos.wjv-1.neo.id';
                $defaultFile = WRITEPATH . 'uploads/' . $file->store();
                $newPath = WRITEPATH . 'uploads/' . "compress_" . $file->getClientName();
                $image->withFile($defaultFile)->save($newPath, 60);

                // Inisiasi helper S3
                $s3Client = new S3Client([
                    'version' => 'latest',
                    'region' => 'idn',
                    'url' => $primaryPath . $bucket,
                    'use_path_style_endpoint' => true,
                    'endpoint' => $primaryPath,
                    'credentials' => [
                        'key' => '5a05fd8e75ac6dc2bf4b',
                        'secret' => 't3Gn6ENAh6f6SfCB4PFyRo22nEA5QPJD4zzBAKTw'
                    ]
                ]);

                $key = basename($newPath);

                try {
                    // Proses upload ke object storage dengan permission file public
                    $result = $s3Client->upload($bucket, $key, fopen($newPath, 'r'), 'public-read');
                    $data = ['result' => $result->toArray()];
                    $values = array_values($data);
                    $filePath = $values[0]["ObjectURL"];
                    $data = [
                        "file_name" => $file->getClientName(),
                        "file_type" => $file->getClientMimeType(),
                        "file_path" => $filePath,
                    ];

                    if ($type === "activity") {
                        $data["title"] = $this->request->getVar("title");
                    }
                    $model->insert($data);
                } catch (S3Exception $e) {
                    $data = ['errors' => $e->getMessage()];
                }
            }
        }
    }

    public function upload($model, $type)
    {
        if ($type !== "activity") {
            foreach ($this->request->getFileMultiple("file") as $file) {
                $this->uploadFile($file, $model, $type);
            }
        } else {
            $file = $this->request->getFile("file");
            $this->uploadFile($file, $model, $type);
        }

        session()->setFlashdata('success_' . $type, 'Upload images is successfully!');
        return redirect()->to(site_url("/" . $type));
    }
}
