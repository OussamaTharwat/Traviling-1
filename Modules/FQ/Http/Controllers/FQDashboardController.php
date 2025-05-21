<?php

namespace Modules\FQ\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\FQ\Http\Requests\FQRequest;
use Modules\FQ\Services\FQDashboardservice;
use Modules\FQ\Transformers\FQResource;

class FQDashboardController extends Controller
{
    use HttpResponse;
    public function __construct(private readonly FQDashboardservice $fqDashboardservice) {}

    public function index()
    {
        $fqs = $this->fqDashboardservice->index();
        return $this->paginatedResponse($fqs, FQResource::class);
    }

    public function show($id)
    {
        $fq = $this->fqDashboardservice->show($id);
        return $this->resourceResponse(FQResource::make($fq));
    }

    public function store(FQRequest $request)
    {
        $this->fqDashboardservice->store($request->validated());
        return $this->okResponse(message: translate_success_message('Fq', 'created'));
    }

    public function update(FQRequest $request, $id)
    {
        $this->fqDashboardservice->update($request->validated(), $id);
        return $this->okResponse(message: translate_success_message('Fq', 'updated'));
    }

    public function destroy($id)
    {
        $this->fqDashboardservice->destroy($id);
        return $this->okResponse(message: translate_success_message('Fq', 'deleted'));
    }
}
