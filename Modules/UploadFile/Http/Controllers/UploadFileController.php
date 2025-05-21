<?php

namespace Modules\UploadFile\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\UploadFile\Http\Requests\UploadFileRequest;
use Modules\UploadFile\Services\UploadFileService;
use Modules\UploadFile\Transformers\UploadFileResource;

class UploadFileController extends Controller
{
    use HttpResponse;

    public function __construct(private readonly UploadFileService $uploadFileService) {}

    public function index()
    {
        $file = $this->uploadFileService->index();
        return $this->paginatedResponse($file, UploadFileResource::class);
    }

    public function show($id)
    {
        $file = $this->uploadFileService->show($id);
        return $this->resourceResponse(UploadFileResource::make($file));
    }

    public function store(UploadFileRequest $request)
    {
        $this->uploadFileService->store($request->validated());
        return $this->createdResponse(message: translate_success_message('upload_file', 'created'));
    }

    public function update(UploadFileRequest $request, $id)
    {
        $this->uploadFileService->update($request->validated(), $id);
        return $this->okResponse(message: translate_success_message('upload_file', 'updated'));
    }

    public function destroy($id)
    {
        $this->uploadFileService->destroy($id);
        return $this->okResponse(message: translate_success_message('upload_file', 'deleted'));
    }
}
