<?php

namespace Modules\Category\Services;

use Modules\Category\Models\Category;
use Modules\Course\Enums\CourseStatus;

class ClientCategoryService
{




    // public function parentCategories()
    // {
    //     return Category::query()
    //         ->withCount(['courses' => function ($query) {
    //             $query->where('status', CourseStatus::Approved);
    //         }])

    //         ->searchable()
    //         ->paginatedCollection();
    // }


    // public function subCategories($parentId)
    // {
    //     return Category::query()
    //         ->where('parent_id', $parentId)
    //         ->withCount(['courses' => function ($query) {
    //             $query->where('status', CourseStatus::Approved);
    //         }])
    //         ->where('status', true)
    //         ->searchable()
    //         ->paginatedCollection();
    // }


    // public function categoriesByType($type)
    // {
    //     return Category::query()
    //         ->where('type', $type)
    //         ->withCount(['courses' => function ($query) {
    //             $query->where('status', Modules\Category\Services\CourseStatus::Approved);
    //         }])
    //         ->paginatedCollection();
    // }
}
