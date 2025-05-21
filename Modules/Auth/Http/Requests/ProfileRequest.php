<?php

namespace Modules\Auth\Http\Requests;

use App\Helpers\GeneralHelper;
use App\Helpers\RequestHelper;
use App\Helpers\ValidationRuleHelper;
use App\Traits\HttpResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Modules\Auth\Enums\GenderEnum;
use Modules\Auth\Enums\UserTypeEnum;
use Modules\Upgrade\Enums\MaritalStatusEnum;

class ProfileRequest extends FormRequest
{
    use HttpResponse;

    public function prepareForValidation()
    {
        RequestHelper::formatPhoneNumber($this);
    }

    public function rules(): array
    {
        return [
            'name' => ValidationRuleHelper::stringRules(),
            'phone' => ValidationRuleHelper::stringRules(),//['required' => 'sometimes']
            // 'email' => ValidationRuleHelper::emailRules(['required' => 'sometimes']),
            'avatar' => ValidationRuleHelper::storeOrUpdateImageRules(true),
            'date'=>'required|date_format:Y-m-d',
        ];
    }

    /**
     * @throws ValidationException
     */
    public function failedValidation(Validator $validator): void
    {
        $this->throwValidationException($validator);
    }
}
