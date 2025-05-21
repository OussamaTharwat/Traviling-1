<?php

namespace Modules\Footer\Http\Requests;

use App\Helpers\ValidationRuleHelper;
use Illuminate\Foundation\Http\FormRequest;
use App\Traits\HttpResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;

class FooterRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        $inUpdate = ! preg_match('/.*upload_files$/', $this->url());
        return [
            'title' => 'array|between:9,9',
            'title.ar' => ValidationRuleHelper::stringRules([
                'required' =>  'required',
            ]),
            'title.en' => ValidationRuleHelper::stringRules([
                'required' =>  'required',
            ]),
            'title.de' => ValidationRuleHelper::stringRules([
                'required' =>  'required',
            ]),
            'title.fr' => ValidationRuleHelper::stringRules([
                'required' =>  'required',
            ]),
            'title.tr' => ValidationRuleHelper::stringRules([
                'required' =>  'required',
            ]),
            'title.pl' => ValidationRuleHelper::stringRules([
                'required' =>  'required',
            ]),
            'title.nl' => ValidationRuleHelper::stringRules([
                'required' =>  'required',
            ]),
            'title.zh' => ValidationRuleHelper::stringRules([
                'required' =>  'required',
            ]),
            'title.ru' => ValidationRuleHelper::stringRules([
                'required' =>  'required',
            ]),


            'description' => 'array|between:9,9',
            'description.ar' => ValidationRuleHelper::stringRules([
                'required' =>  'required',
            ]),
            'description.en' => ValidationRuleHelper::stringRules([
                'required' =>  'required',
            ]),
            'description.de' => ValidationRuleHelper::stringRules([
                'required' =>  'required',
            ]),
            'description.fr' => ValidationRuleHelper::stringRules([
                'required' =>  'required',
            ]),
            'description.tr' => ValidationRuleHelper::stringRules([
                'required' =>  'required',
            ]),
            'description.pl' => ValidationRuleHelper::stringRules([
                'required' =>  'required',
            ]),
            'description.nl' => ValidationRuleHelper::stringRules([
                'required' =>  'required',
            ]),
            'description.zh' => ValidationRuleHelper::stringRules([
                'required' =>  'required',
            ]),
            'description.ru' => ValidationRuleHelper::stringRules([
                'required' =>  'required',
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
