<?php

namespace App\Models;

use App\Models\Builders\UserBuilder;
use App\Traits\PaginationTrait;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\Auth\Enums\AuthEnum;
use Modules\Auth\Traits\UserRelations;
use Spatie\MediaLibrary\HasMedia;
use Modules\Role\Traits\HasPermissions;
use Spatie\MediaLibrary\InteractsWithMedia;

class User extends Authenticatable implements HasMedia
{
    use HasFactory,
        Notifiable,
        HasApiTokens,
        InteractsWithMedia,
        Notifiable,
        PaginationTrait,
        Searchable,
        UserRelations,
        HasPermissions,
        UserRelations;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'type',
        'status',
        'password',
        AuthEnum::VERIFIED_AT,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    public function newEloquentBuilder($query)
    {
        return new UserBuilder($query);
    }

    public function resetAvatar(): void
    {
        $this->addMediaCollection(AuthEnum::AVATAR_COLLECTION_NAME)->singleFile();
    }

    public function routeNotificationForFcm(): ?string
    {
        return $this->fcm_token;
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection(AuthEnum::AVATAR_COLLECTION_NAME)->singleFile();
    }

    public static function getUniqueColumnValue()
    {
        return 'email';
    }
}
