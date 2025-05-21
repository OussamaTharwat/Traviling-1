<?php

namespace Modules\Auth\Services;

use App\Exceptions\ValidationErrorsException;
use App\Models\Builders\UserBuilder;
use App\Models\User;

class UserService
{
    /**
     * @throws ValidationErrorsException
     */
    public static function columnExists(
        string $value,
        $id = null,
        string $columnName = 'phone',
        string $errorKey = 'phone'
    ): void {
        $exists = User::query()->where($columnName, $value)->when(! is_null($id), fn ($q) => $q->where('id', '<>', $id))->exists();

        if ($exists) {
            throw new ValidationErrorsException([
                $errorKey => translate_error_message($errorKey, 'exists'),
            ]);
        }
    }


    public function index()
    {
        //filters
        $search = request()->search;
        $category_id =  request()->category_id;
        $language_id =  request()->language_id;
        $level =  request()->level;
        $payment_status =  request()->payment_status;
        $order_by =  request()->order_by;

        return User::query()
            ->latest()
            ->when(true, fn(UserBuilder $b) => $b->withMinimalDetails())
            // ->when($search, fn($builder) => $builder->where("name", "LIKE", "%$search%"))
            ->searchable(['name'])
            ->paginatedCollection();
    }

}
