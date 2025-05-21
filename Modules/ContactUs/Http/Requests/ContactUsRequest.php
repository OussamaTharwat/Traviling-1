<?php

namespace Modules\ContactUs\Http\Requests;

use App\Helpers\ValidationRuleHelper;
use App\Traits\HttpResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class ContactUsRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        return [
            'first_name' => ValidationRuleHelper::stringRules(['required' => 'required']),
            'last_name' => ValidationRuleHelper::stringRules(['required' => 'required']),
            'email' => ValidationRuleHelper::emailRules(['required' => 'required']),
            'phone' => ValidationRuleHelper::stringRules(['required' => 'required']),
            'message' => ValidationRuleHelper::longTextRules(),
        ];
    }

    /**
     * @throws ValidationException
     */
    public function failedValidation(Validator $validator): void
    {
        $this->throwValidationException($validator);
    }


    public function messages(): array
    {
        return [
            'first_name.regex' => 'Text must not contain symbols !',
            'last_name.regex' => 'Text must not contain symbols !',
            'message.regex' => 'Text must not contain symbols !',
        ];
    }
}
