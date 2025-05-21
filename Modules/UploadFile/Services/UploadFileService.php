<?php

namespace Modules\UploadFile\Services;

use App\Helpers\MediaHelper;
use Illuminate\Support\Facades\DB;
use Modules\UploadFile\Enum\MediaFileEnum;
use Modules\UploadFile\Models\UploadFile;

class UploadFileService
{
    public function index()
    {
        return UploadFile::query()
            ->latest()
            ->with(['file'])
            ->paginatedCollection();
    }

    public function show($id)
    {
        return UploadFile::query()
            ->latest()
            ->with(['file'])
            ->findOrFail($id);
    }

    public function store(array $data)
    {
        DB::transaction(function () use ($data) {
            $fileData = collect($data)->except('file')->toArray(); // استبعدنا 'file'
            $file = UploadFile::create($fileData);

            MediaHelper::uploadMedia($file, $data['file'] ?? null, MediaFileEnum::FILE);
        });
    }


    public function update(array $data, $id)
    {
        DB::transaction(function () use ($data, $id) {
            $file = UploadFile::findOrFail($id);
            $fileData = collect($data)->except('file')->toArray(); // استبعدنا 'file'
            $file->update($fileData);

            MediaHelper::uploadMedia($file, $data['file'] ?? null, MediaFileEnum::FILE);
        });
    }


    public function destroy($id)
    {
        $file = UploadFile::query()->findOrFail($id);
        $file->delete();
    }
}
