<?php

namespace App\Http\Controllers;

use App\Actions\StoreFile;
use App\Dto\FileFormData;
use App\Http\Requests\FileFormRequest;
use App\Jobs\FileUploadJob;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index(Request $request)
    {
        return \view('file-index');
    }

    public function saveFile(FileFormRequest $request, StoreFile $storeFile)
    {
        try {
            $formData = $request->validated();
            $formData = FileFormData::fromArray($formData);

            if ($request->hasFile('file')) {
                $fileName = now()->format('Y-m-d-H:i:s');

                $formData->file->storeAs('files', $fileName);

                dispatch(new FileUploadJob(filePath: $fileName, fileName: 'testing-file-upload'));
            }

            return response()->json(['status' => true, 'messsage' => 'uploaded the file..']);
        } catch (\Throwable $th) {
            return back()->withInput();
        }
    }
}
