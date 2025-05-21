<?php

namespace Modules\FQ\Http\Requests;

use App\Helpers\ValidationRuleHelper;
use Illuminate\Foundation\Http\FormRequest;
use App\Traits\HttpResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;

class FQRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        $is_update = request()->method() == 'PUT';
        return [
            'question' => 'array|between:9,9',
            'question.ar' => ValidationRuleHelper::stringRules([
                'required' => $is_update ? 'sometimes' : 'required',
            ]),
            'question.en' => ValidationRuleHelper::stringRules([
                'required' => $is_update ? 'sometimes' : 'required',
            ]),
            'question.fr' => ValidationRuleHelper::stringRules([
                'required' => $is_update ? 'sometimes' : 'required',
            ]),
            'question.de' => ValidationRuleHelper::stringRules([
                'required' => $is_update ? 'sometimes' : 'required',
            ]),
            'question.zh' => ValidationRuleHelper::stringRules([
                'required' => $is_update ? 'sometimes' : 'required',
            ]),
            'question.pl' => ValidationRuleHelper::stringRules([
                'required' => $is_update ? 'sometimes' : 'required',
            ]),
            'question.nl' => ValidationRuleHelper::stringRules([
                'required' => $is_update ? 'sometimes' : 'required',
            ]),
            'question.ru' => ValidationRuleHelper::stringRules([
                'required' => $is_update ? 'sometimes' : 'required',
            ]),
            'question.tr' => ValidationRuleHelper::stringRules([
                'required' => $is_update ? 'sometimes' : 'required',
            ]),




            'answer' => 'array|between:9,9',
            'answer.ar' => ValidationRuleHelper::stringRules([
                'required' => $is_update ? 'sometimes' : 'required',
            ]),
            'answer.en' => ValidationRuleHelper::stringRules([
                'required' => $is_update ? 'sometimes' : 'required',
            ]),
            'answer.fr' => ValidationRuleHelper::stringRules([
                'required' => $is_update ? 'sometimes' : 'required',
            ]),
            'answer.de' => ValidationRuleHelper::stringRules([
                'required' => $is_update ? 'sometimes' : 'required',
            ]),
            'answer.zh' => ValidationRuleHelper::stringRules([
                'required' => $is_update ? 'sometimes' : 'required',
            ]),
            'answer.pl' => ValidationRuleHelper::stringRules([
                'required' => $is_update ? 'sometimes' : 'required',
            ]),
            'answer.nl' => ValidationRuleHelper::stringRules([
                'required' => $is_update ? 'sometimes' : 'required',
            ]),
            'answer.ru' => ValidationRuleHelper::stringRules([
                'required' => $is_update ? 'sometimes' : 'required',
            ]),
            'answer.tr' => ValidationRuleHelper::stringRules([
                'required' => $is_update ? 'sometimes' : 'required',
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
