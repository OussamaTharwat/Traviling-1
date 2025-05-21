<?php

namespace Modules\AboutUs\Models;

use App\Helpers\MediaHelper;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class AboutUs extends Model implements HasMedia
{
    use InteractsWithMedia,HasTranslations;

    protected $fillable = [
        'title_about',
        'description_about',
        'title_mission',
        'description_mission',
        'title_vision',
        'description_vision',
        // 'youtube_link',
    ];


    public $translatable = [
        'title_about',
        'description_about',
        'title_mission',
        'description_mission',
        'title_vision',
        'description_vision',
    ];


    public function image()
    {
        return MediaHelper::mediaRelationship($this, 'about_us_image');
    }

    public function resetImage(): void
    {
        $this->clearMediaCollection('about_us_image');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('about_us_image')->singleFile();
    }
}
