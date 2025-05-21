<?php

namespace Modules\Auth\Http\Requests;

use App\Helpers\DateHelper;
use App\Helpers\GeneralHelper;
use App\Helpers\TranslationHelper;
use App\Helpers\ValidationRuleHelper;
use App\Traits\HttpResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class FieldOfWorkRequest extends FormRequest
{
    use HttpResponse;


    public function rules()
    {
        return [
            'field'=>'array|required',
            'field.*.name' => ValidationRuleHelper::stringRules(),
        ];
    }

    public function failedValidation(Validator $validator): void
    {
        $this->throwValidationException($validator);
    }
}
