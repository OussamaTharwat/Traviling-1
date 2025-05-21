<?php

namespace Modules\FQ\Models;

use App\Traits\PaginationTrait;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\FQ\Models\Builder\FQBuilder;
use Modules\FQ\Traits\FQRelations;
use Spatie\Translatable\HasTranslations;

class FQ extends Model
{
    use HasFactory,
        Searchable,
        HasTranslations,
        PaginationTrait,
        FQRelations;

    protected $table = 'f_qs';

    protected $fillable = [
        'question',
        'answer',
    ];
    public $translatable = [
        'question',
        'answer',
    ];
    public function newEloquentBuilder($query)
    {
        return new FQBuilder($query);
    }
}
