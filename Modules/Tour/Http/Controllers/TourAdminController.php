<?php

namespace Modules\Tour\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\Tour\Http\Requests\TourRequest;
use Modules\Tour\Services\TourAdminService;
use Modules\Tour\Transformers\TourResource;

class TourAdminController extends Controller
{
    use HttpResponse;

    public function __construct(private readonly TourAdminService $tourAdminService) {}

    public function index()
    {
        $tour = $this->tourAdminService->index();
        return $this->paginatedResponse($tour, TourResource::class);
    }

    public function show($id)
    {
        $tour = $this->tourAdminService->show($id);
        return $this->resourceResponse(TourResource::make($tour));
    }

    public function store(TourRequest $request)
    {
        $this->tourAdminService->store($request->validated());
        return $this->createdResponse(message: translate_success_message('tour', 'created'));
    }

    public function update(TourRequest $request, $id)
    {
        $this->tourAdminService->update($request->validated(), $id);
        return $this->okResponse(message: translate_success_message('tour', 'updated'));
    }

    public function detroy($id)
    {
        $this->tourAdminService->destroy($id);
        return $this->okResponse(message: translate_success_message('tour', 'deleted'));
    }
}
