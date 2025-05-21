<?php

namespace Modules\Tour\Traits;

use App\Helpers\MediaHelper;
use Modules\Category\Models\Category;
use Modules\Tour\Enum\MediaTourPhoto;

trait TourRelation
{
    public function image()
    {
        return MediaHelper::mediaRelationship($this, 'image');
    }

    public function images()
    {
        return MediaHelper::mediaRelationship($this, MediaTourPhoto::IMAGES);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
