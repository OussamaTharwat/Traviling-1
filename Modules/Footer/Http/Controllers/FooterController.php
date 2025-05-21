<?php

namespace Modules\Footer\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\Footer\Http\Requests\FooterRequest;
use Modules\Footer\Services\FooterService;
use Modules\Footer\Transformers\FooterResource;

class FooterController extends Controller
{
    use HttpResponse;

    public function __construct(private readonly FooterService $footerService) {}

    public function index()
    {
        $footer = $this->footerService->index();
        return $this->resourceResponse(FooterResource::collection($footer));
    }

    public function update(FooterRequest $request)
    {
        $this->footerService->update($request->validated());
        return $this->okResponse(message: translate_success_message('footer', 'updated'));
    }
}
