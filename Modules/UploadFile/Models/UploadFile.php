<?php

namespace Modules\UploadFile\Models;

use App\Helpers\MediaHelper;
use App\Traits\PaginationTrait;
use Illuminate\Database\Eloquent\Model;
use Modules\UploadFile\Enum\MediaFileEnum;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class UploadFile extends Model implements HasMedia
{
    use InteractsWithMedia,PaginationTrait;

    protected $fillable = [];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(MediaFileEnum::FILE)->singleFile();
    }

     public function file()
    {
        return MediaHelper::mediaRelationship($this, 'file');
    }
}
