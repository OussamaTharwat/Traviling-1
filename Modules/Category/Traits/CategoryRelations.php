<?php

namespace Modules\Category\Traits;


use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Category\Models\Category;
use Modules\Trip\Models\Trip;

trait CategoryRelations
{
    public function subCategories(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function parentCategory(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function trips()
    {
        return $this->hasMany(Trip::class, 'category_id');
    }
}
