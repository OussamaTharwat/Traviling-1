<?php

namespace Modules\Category\Services;

use App\Exceptions\ValidationErrorsException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Modules\Category\Models\Category;

class AdminParentCategoryService
{
    public function index()
    {
        return Category::query()
            ->latest()
            ->select(['id', 'name'])
            ->searchable(['name'])
            ->paginate(5);
    }

    public function show($id)
    {
        return Category::query()
            ->findOrFail($id);
    }

    public function store(array $data)
    {

        DB::transaction(function () use ($data) {
            Category::create($data);
        });
    }

    public function update(array $data, $id)
    {
        DB::transaction(function () use ($data, $id) {
            $category = Category::findOrFail($id);
            $category->update($data);
        });
    }

    /**
     * @throws ValidationErrorsException
     */
    public function assertUniqueName(string $name, $id = null, string $errorKey = 'name')
    {
        $categoryExists = Category::query()
            ->whereNull('parent_id')
            ->where('name', $name)
            ->when(! is_null($id), fn($q) => $q->where('id', '!=', $id))
            ->exists();

        if ($categoryExists) {
            throw new ValidationErrorsException([
                $errorKey => translate_error_message($errorKey, 'exists'),
            ]);
        }
    }

    /**
     * @throws ValidationErrorsException
     */
    public function exists($id, string $errorKey = 'parent_id')
    {
        $parent = Category::query()->whereNull('parent_id')->find($id);

        if (! $parent) {
            throw new ValidationErrorsException([
                $errorKey => translate_error_message('parent_category', 'not_exists'),
            ]);
        }

        return $parent;
    }

    /**
     * @throws ValidationErrorsException
     */
    public function exist(array $ids, string $errorKey = 'categories.*')
    {
        $data = Category::query()->whereIntegerInRaw('id', $ids)->whereNull('parent_id')->get();
        $dataIds = $data->pluck('id')->toArray();

        $counter = 0;
        foreach ($ids as $id) {
            if (! in_array($id, $dataIds)) {
                throw new ValidationErrorsException([
                    Str::replace('*', $counter, $errorKey) => translate_error_message('category', 'not_exists'),
                ]);
            }
            $counter++;
        }

        return $data;
    }
}
