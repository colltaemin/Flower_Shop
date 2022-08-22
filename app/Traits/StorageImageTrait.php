<?php

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Support\Facades\Storage;

trait StorageImageTrait
{
    public function uploadImage($request, $fieldName, $foderName)
    {
        if ($request->hasFile($fieldName)) {
            $file = $request->{$fieldName};
            $fileNameOriginal = $file->getClientOriginalName();
            $fileNameHash = str_random('20').'.'.$file->getClientOriginalExtension();
            $filePath = $request->file($fieldName)->storeAs('public/'.$foderName.'/'.auth()->id(), $fileNameHash);

            return [
                'file_name' => $fileNameOriginal,
                'file_path' => Storage::url($filePath),
            ];
        }

        return null;
    }

    public function uploadImageMultiple($file, $foderName)
    {
        $fileNameOriginal = $file->getClientOriginalName();
        $fileNameHash = str_random('20').'.'.$file->getClientOriginalExtension();
        $filePath = $file->storeAs('public/'.$foderName.'/'.auth()->id(), $fileNameHash);

        return [
            'file_name' => $fileNameOriginal,
            'file_path' => Storage::url($filePath),
        ];
    }
}
