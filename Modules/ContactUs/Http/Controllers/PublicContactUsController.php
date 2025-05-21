<?php

namespace Modules\ContactUs\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\ContactUs\Http\Requests\ContactUsRequest;
use Modules\ContactUs\Services\ContactUsService;
use Modules\ContactUs\Services\PublicContactUsService;
use Modules\ContactUs\Transformers\ContactUsResource;

class PublicContactUsController extends Controller
{
    use HttpResponse;

    public ContactUsService $contactUsService;

    public function __construct(private readonly PublicContactUsService $publicContactUsService) {}

    public function store(ContactUsRequest $request)
    {
        $this->publicContactUsService->store($request->validated());
        return $this->createdResponse(message: translate_success_message('contact_us', 'created'));
    }
}
