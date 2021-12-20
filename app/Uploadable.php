<?php

namespace App;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

trait Uploadable
{
    public function uploadOne(UploadedFile $file, int $width, int $height, string $folder = 'images/',bool $originalExtension = false)
    {
        $generateName = date('Ymdhms') . Str::random(6);
        if ($originalExtension) {
            $generateNameWithExt = '/' . $generateName . "." . $file->getClientOriginalExtension();
        } else {
            $generateNameWithExt = '/' . $generateName . "." . 'webp';
        }
        if (!File::exists(public_path($folder))) {
            File::makeDirectory(public_path($folder), 0777, true);
        }
        Image::make($file)->resize($width, $height)->save(public_path($folder . $generateNameWithExt)); //resizing image
        return $generateNameWithExt;
    }

    public function deleteOne($directory, $filename)
    {
        File::delete(public_path($directory . $filename));
    }
}
