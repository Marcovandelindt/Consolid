<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait ImageUploadTrait 
{
    /**
     * Store the image
     * 
     * @param UploadedFile $uploadedFile
     * @param string       $folder
     * @param string       $disk
     * @param string       $fileName
     * 
     * @return string
     */
    public function storeImage(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $fileName = null)
    {
        $name = (!is_null($fileName) ? $fileName : Str::random(25));

        $file = $uploadedFile->storeAs($folder, $name . '.' . $uploadedFile->getClientOriginalExtension(), $disk);

        return $file;
    }
}