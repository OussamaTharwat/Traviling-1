<?php

namespace Modules\Category\Models;

use App\Traits\PaginationTrait;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\Models\Builders\CategoryBuilder;
use Modules\Category\Traits\CategoryRelations;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use CategoryRelations, PaginationTrait, Searchable, HasTranslations;


    protected $fillable = ['name'];


    public function newEloquentBuilder($query): CategoryBuilder
    {
        return new CategoryBuilder($query);
    }


    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}
