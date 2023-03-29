<?php

namespace App\Http\Controllers\Voyager;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Pion\Laravel\ChunkUpload\Exceptions\UploadMissingFileException;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

class VoyagerChunkController extends Controller
{
    /**
     * @param string $slug
     * @param UploadedFile $file
     * @return JsonResponse
     */
    protected function saveFile(string $slug, UploadedFile $file): JsonResponse
    {
        $fileName = $this->createFilename($file);
        // Group files by the date (week
        $dateFolder = date('FY');

        // Build the file path
        $filePath = "{$slug}/{$dateFolder}/";
        $finalPath = storage_path("app/public/".$filePath);

        // move the file name
        $file->move($finalPath, $fileName);

        return response()->json($filePath . $fileName);
    }

    /**
     * Create unique filename for uploaded file
     * @param UploadedFile $file
     * @return string
     */
    protected function createFilename(UploadedFile $file): string
    {
        $extension = $file->getClientOriginalExtension();
        // Add timestamp hash to name of the file
        return '_' . md5(time()) . '.' . $extension;
    }

    /**
     * Handles the file upload
     *
     * @param string $slug
     * @param FileReceiver $receiver
     *
     * @return JsonResponse
     *
     * @throws UploadMissingFileException
     */
    public function uploadFile(string $slug, FileReceiver $receiver): JsonResponse
    {
        // check if the upload is success, throw exception or return response you need
        if ($receiver->isUploaded() === false) {
            throw new UploadMissingFileException();
        }
        // receive the file
        $save = $receiver->receive();

        // check if the upload has finished (in chunk mode it will send smaller files)
        if ($save->isFinished()) {
            // save the file and return any response you need
            return $this->saveFile($slug, $save->getFile());
        }

        // we are in chunk mode, lets send the current progress
        $handler = $save->handler();
        return response()->json([
            "done" => $handler->getPercentageDone()
        ]);
    }
}
