<?php

namespace Modules\Auth\Http\Requests;

use App\Helpers\DateHelper;
use App\Helpers\TranslationHelper;
use App\Helpers\ValidationRuleHelper;
use App\Traits\HttpResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class SocialMediaRequest extends FormRequest
{
    use HttpResponse;


    public function rules()
    {
        return [
            'facebook'=>ValidationRuleHelper::urlRules(false),
            'x' => ValidationRuleHelper::urlRules(false),
            'linkedin' => ValidationRuleHelper::urlRules(false),
            'github' =>ValidationRuleHelper::urlRules(false),
            'instagram' => ValidationRuleHelper::urlRules(false),
        ];
    }

    public function failedValidation(Validator $validator): void
    {
        $this->throwValidationException($validator);
    }
}
