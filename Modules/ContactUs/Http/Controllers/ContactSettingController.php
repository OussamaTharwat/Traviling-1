<?php

namespace Modules\ContactUs\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\ContactUs\Http\Requests\AdminContactUsRequest;
use Modules\ContactUs\Services\ContactSettingService;

class ContactSettingController extends Controller
{
    use HttpResponse;

    public function __construct(private readonly ContactSettingService $contactSettingService) {}

    public function get()
    {
        $contact = $this->contactSettingService->get();
        return $contact;
    }

    public function update(AdminContactUsRequest $request)
    {
        $this->contactSettingService->update($request->validated());
        return $this->okResponse(message: translate_success_message('contact_us', 'updated'));
    }
}
