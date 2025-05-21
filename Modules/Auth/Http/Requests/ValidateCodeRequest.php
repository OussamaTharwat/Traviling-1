<?php

namespace Modules\Auth\Http\Requests;

use App\Helpers\ValidationRuleHelper;
use App\Traits\HttpResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ValidateCodeRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        return [
            'code' => ValidationRuleHelper::integerRules(),
            'handle' => ValidationRuleHelper::emailRules(),
            // 'current_password' => ValidationRuleHelper::sameLoggedUserPassword(),
        ];
    }

    public function failedValidation(Validator $validator): void
    {
        $this->throwValidationException($validator);
    }
}
