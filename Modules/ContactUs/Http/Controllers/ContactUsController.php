<?php

namespace Modules\ContactUs\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\ContactUs\Http\Requests\AdminContactUsRequest;
use Modules\ContactUs\Http\Requests\ContactUsRequest;
use Modules\ContactUs\Http\Requests\StatusRequest;
use Modules\ContactUs\Services\ContactUsService;
use Modules\ContactUs\Transformers\ContactUsResource;

class ContactUsController extends Controller
{
    use HttpResponse;

    public ContactUsService $contactUsService;

    public function __construct(ContactUsService $ContactUsServices)
    {
        $this->contactUsService = $ContactUsServices;
    }

    public function index()
    {
        $data = $this->contactUsService->index();
        return $this->paginatedResponse($data, ContactUsResource::class);
    }

    public function show($id)
    {
        $data = $this->contactUsService->show($id);
        return $this->okResponse(new ContactUsResource($data));
    }

    public function store(AdminContactUsRequest $request)
    {
        $this->contactUsService->store($request->validated());
        return $this->okResponse(message: translate_success_message('contact_us', 'updated'));
    }

    public function update(AdminContactUsRequest $request, $id)
    {
        $this->contactUsService->update($request->validated(), $id);
        return $this->okResponse(message: translate_success_message('contact_us', 'updated'));
    }

    public function destroy($id)
    {
        $this->contactUsService->destroy($id);
        return $this->okResponse(message: translate_success_message('contact_us', 'deleted'));
    }
}
