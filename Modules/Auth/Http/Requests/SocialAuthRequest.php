<?php

namespace Modules\Auth\Http\Requests;

use App\Helpers\ValidationRuleHelper;
use App\Traits\HttpResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Modules\Auth\Enums\SocialAuthEnum;

class SocialAuthRequest extends FormRequest
{
    use HttpResponse;

    public function rules()
    {
        return [
            'access_token' => ['required'],
            'provider' => ValidationRuleHelper::enumRules(SocialAuthEnum::toArray()),
            // 'status' => ValidationRuleHelper::booleanRules(),
        ];
    }

    public function failedValidation(Validator $validator): void
    {
        $this->throwValidationException($validator);
    }
}

