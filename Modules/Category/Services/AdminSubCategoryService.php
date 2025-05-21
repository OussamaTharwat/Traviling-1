<?php

namespace Modules\Category\Services;

use App\Exceptions\ValidationErrorsException;
use App\Services\ImageService;
use Illuminate\Support\Facades\DB;
use Modules\Category\Models\Category;

readonly class AdminSubCategoryService
{
    public function __construct(private AdminParentCategoryService $adminParentCategoryService) {}

    public function index($parentId)
    {
        return Category::query()
            ->latest()
            ->when(! is_null($parentId), fn($b) => $b->where('parent_id', $parentId))
            ->with(['parentCategory:id,name'])
            ->with(['parentCategory:id,name,parent_id', 'parentCategory.parentCategory:id,name,parent_id'])
            ->withCount('courses')
            ->searchable()
            ->paginatedCollection();
    }

    public function show($id)
    {
        return Category::query()
            ->whereNotNull('parent_id')
            ->with(['parentCategory:id,name,parent_id', 'parentCategory.parentCategory:id,name,parent_id'])
            ->findOrFail($id);
    }

    /**
     * @throws ValidationErrorsException
     */
    public function store(array $data)
    {
        $parentId = $data['parent_id'];
        // $this->assertUniqueName($data['name'], $parentId);

        // $this->adminParentCategoryService->exists($parentId);
        $parent = Category::query()->findOrFail($parentId);

        if ($parent->type) {
            throw new ValidationErrorsException([
                'parent_id' => translate_error_message('category', 'not_exists'),
            ]);
        }
        if (!$parent->type && $parent->parent_id) {
            $data['type'] = 1;
        }

        DB::transaction(function () use ($data) {
            $category = Category::create(array_merge($data));

            //            $imageService = new ImageService($category, $data);
            //            $imageService->storeOneMediaFromRequest('categories', 'image');
        });
    }

    public function update(array $data, $id)
    {
        $category = Category::query()
            ->findOrFail($id);

        if (isset($data['parent_id'])) {
            $parent = Category::query()->where('id', $data['parent_id'])->first();

            if ($parent->type) {
                throw new ValidationErrorsException([
                    'parent_id' => translate_error_message('category', 'not_exists'),
                ]);
            }
            if (!$parent->type && $parent->parent_id) {
                $data['type'] = 1;
            }
            if ($parent->type) {
                throw new ValidationErrorsException([
                    'parent_id' => translate_error_message('category', 'not_exists'),
                ]);
            }
        }

        DB::transaction(function () use ($category, $data) {
            $category->update($data);

            //            $imageService = new ImageService($category, $data);
            //            $imageService->updateOneMedia('categories', 'image');
        });
    }

    /**
     * @throws ValidationErrorsException
     */
    public function assertUniqueName(string $name, $parentId, $id = null, string $errorKey = 'name')
    {
        $category = Category::query()
            ->whereNotNull('parent_id')
            ->where('parent_id', $parentId)
            ->where('name', $name)
            ->when(! is_null($id), fn($query) => $query->where('id', '!=', $id))
            ->exists();

        if ($category) {
            throw new ValidationErrorsException([
                $errorKey => translate_error_message('name', 'exists'),
            ]);
        }
    }

    public function exists($id, string $errorKey = 'category_id')
    {
        $category = Category::query()
            ->whereNotNull('parent_id')
            ->where('status', true)
            ->find($id);

        if (! $category) {
            throw new ValidationErrorsException([
                $errorKey => translate_error_message('category', 'not_exists'),
            ]);
        }

        return $category;
    }
}
