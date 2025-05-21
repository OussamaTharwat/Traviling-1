<?php

namespace Modules\Tour\Http\Requests;

use App\Helpers\ValidationRuleHelper;
use Illuminate\Foundation\Http\FormRequest;
use App\Traits\HttpResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;

class TourRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        $inUpdate = ! preg_match('/.*tours$/', $this->url());
        return [
            'title' => 'array|between:9,9',
            'title.ar' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'title.en' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'title.de' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'title.fr' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'title.tr' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'title.pl' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'title.nl' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'title.zh' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'title.ru' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),


            'description' => 'array|between:9,9',
            'description.ar' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'description.en' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'description.de' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'description.fr' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'description.tr' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'description.pl' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'description.nl' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'description.zh' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'description.ru' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),

            'duration' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'difficulty' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),

            'group_size' => ValidationRuleHelper::integerRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'discound' => ValidationRuleHelper::integerRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'price_per_person' => ValidationRuleHelper::integerRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),

            'category_id' => ValidationRuleHelper::foreignKeyRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
                'exists' => 'exists:categories,id'
            ]),

            'itinerary' => ValidationRuleHelper::arrayRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'facilities' => ValidationRuleHelper::arrayRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'features' => ValidationRuleHelper::arrayRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),

            'map_url' => ValidationRuleHelper::urlRules(),

            'image' => ValidationRuleHelper::storeOrUpdateImageRules(false),
            'images' => 'nullable|array',
            'images.*' => ValidationRuleHelper::storeOrUpdateImageRules(false),
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
