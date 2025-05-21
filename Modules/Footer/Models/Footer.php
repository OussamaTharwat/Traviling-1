<?php

namespace Modules\Footer\Models;

use App\Traits\PaginationTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Footer extends Model
{
      use InteractsWithMedia, HasTranslations,PaginationTrait;

    protected $fillable = ['title', 'description'];

    protected $translatable = ['title', 'description'];
}
