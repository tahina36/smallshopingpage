<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class FileController extends Controller
{
    public function getPubliclyStorgeFileImage($filename)
    {
        return $this->getPubliclyStorgeFile('./uploads/', $filename);
    }

    private function getPubliclyStorgeFile($filepath, $filename)
    {
        $path = storage_path('app/public/'. $filepath . $filename);
        if (!File::exists($path)) {
            abort(404);
        }
        $file = File::get($path);
        $type = File::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    }
}
