<?php

declare(strict_types = 1);

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Upload
{
    /**
     * Set file name.
     *
     * @param UploadedFile $img      Uploaded file
     * @param string       $fileName File     name
     * 
     * @return string
     */
    public function setImgName(UploadedFile $img, string $fileName): string
    {
        $extension = $img->extension();
        $path = $fileName . '.' . $extension;

        return $path;
    }

    /**
     * Delete image.
     *
     * @param string $path     Path
     * @param string $fileName File name
     * 
     * @return void
     */
    public function deleteImg(string $path, string $fileName)
    {
        return Storage::delete($path . '/' . $fileName);
    }
}
