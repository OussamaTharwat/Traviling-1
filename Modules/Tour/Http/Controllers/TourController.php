<?php

namespace Modules\Tour\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\HttpResponse;
use Modules\Tour\Services\TourService;
use Modules\Tour\Transformers\TourResource;

class TourController extends Controller
{
    use HttpResponse;

    public function __construct(private readonly TourService $tourService) {}

    public function index()
    {
        $tour = $this->tourService->index();
        return $this->paginatedResponse($tour, TourResource::class);
    }

    public function show($id)
    {
        $tour = $this->tourService->show($id);
        return $this->resourceResponse(TourResource::collect($tour));
    }
}
