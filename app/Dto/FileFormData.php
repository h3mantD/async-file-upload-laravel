<?php

namespace App\Dto;

use Illuminate\Http\UploadedFile;

final readonly class FileFormData
{
    public function __construct(public UploadedFile $file)
    {
    }

    public static function fromArray(array $data): self
    {
        return new self(file: $data['file']);
    }
}
