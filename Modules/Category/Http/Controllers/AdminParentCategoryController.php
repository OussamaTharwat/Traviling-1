<?php

namespace Modules\Category\Http\Controllers;

use App\Traits\HttpResponse;
use Illuminate\Routing\Controller;
use Modules\Category\Http\Requests\ParentCategoryRequest;
use Modules\Category\Models\Category;
use Modules\Category\Services\AdminParentCategoryService;
use Modules\Category\Transformers\CategoryResource;

class AdminParentCategoryController extends Controller
{
    use HttpResponse;

    public function __construct(private readonly AdminParentCategoryService $parentCategoryService) {}

    public function index()
    {
        $categories = $this->parentCategoryService->index();

        return $this->paginatedResponse($categories, CategoryResource::class);
    }

    public function show($id)
    {
        $category = $this->parentCategoryService->show($id);

        return $this->resourceResponse(CategoryResource::make($category));
    }

    public function store(ParentCategoryRequest $request)
    {
        $this->parentCategoryService->store($request->validated());

        return $this->createdResponse(message: translate_success_message('category', 'created'));
    }

    public function update(ParentCategoryRequest $request, $id)
    {
        $this->parentCategoryService->update($request->validated(), $id);

        return $this->okResponse(message: translate_success_message('category', 'updated'));
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return $this->okResponse(message: translate_success_message('category', 'deleted'));
    }
}
