<?php

namespace App\Actions;

use Illuminate\Http\UploadedFile;

final class StoreFile
{
    public function handle(UploadedFile $file)
    {
        $file->storeAs(path: 'files', name: $file->getClientOriginalName());
    }
}
