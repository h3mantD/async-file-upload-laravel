<?php

namespace App\Jobs;

use App\Actions\StoreFile;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class FileUploadJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(protected string $filePath, protected string $fileName)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(StoreFile $storeFile): void
    {
        if (Storage::disk('local')->exists("files/{$this->filePath}")) {
            $content = Storage::disk('local')->get("files/{$this->filePath}");

            Storage::disk('other-server')->put(path: $this->fileName, contents: $content);
        }
    }
}
