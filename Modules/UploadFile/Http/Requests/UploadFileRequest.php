<?php

namespace Modules\UploadFile\Http\Requests;

use App\Helpers\ValidationRuleHelper;
use Illuminate\Foundation\Http\FormRequest;
use App\Traits\HttpResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;

class UploadFileRequest extends FormRequest
{
    use HttpResponse;

    public function rules(): array
    {
        return [
            'file' => ValidationRuleHelper::fileRules(),
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
