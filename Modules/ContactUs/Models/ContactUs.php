<?php

namespace Modules\ContactUs\Models;

use App\Traits\PaginationTrait;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class ContactUs extends Model implements HasMedia
{
    use PaginationTrait,
        InteractsWithMedia,
        Searchable,
        HasTranslations,
        PaginationTrait;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'message',
        'map_url',
    ];
}
