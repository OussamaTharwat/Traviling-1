<?php

namespace Modules\ConditionAndPrivacy\Http\Requests;

use App\Helpers\ValidationRuleHelper;
use App\Traits\HttpResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class ConditionAndPrivacyRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        return [
            'content' => ValidationRuleHelper::arrayRules([
                'required' => 'sometimes',
                'max' => 'max:3',
            ]),
            'content.*' => ValidationRuleHelper::longTextRules([
                'required' => 'sometimes',
            ]),
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
