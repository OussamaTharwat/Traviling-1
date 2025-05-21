<?php

namespace Modules\AboutUs\Http\Requests;

use App\Helpers\ValidationRuleHelper;
use Illuminate\Foundation\Http\FormRequest;

class AboutUsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $inUpdate = !preg_match('/.*about_us$/', $this->url());
        return [
            'title_about' => 'array|between:9,9',
            'title_about.ar' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'title_about.en' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'title_about.fr' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'title_about.de' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'title_about.pl' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'title_about.ru' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'title_about.zh' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'title_about.tr' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'title_about.nl' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),



            'title_mission' => 'array|between:9,9',
            'title_mission.ar' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'title_mission.en' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'title_mission.fr' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'title_mission.de' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'title_mission.pl' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'title_mission.ru' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'title_mission.zh' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'title_mission.tr' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'title_mission.nl' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),



            'title_vision' => 'array|between:9,9',
            'title_vision.ar' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'title_vision.en' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'title_vision.fr' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'title_vision.de' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'title_vision.pl' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'title_vision.ru' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'title_vision.zh' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'title_vision.tr' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'title_vision.nl' => ValidationRuleHelper::stringRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),



            'description_about' => 'array|between:9,9',
            'description_about.ar' => ValidationRuleHelper::longTextRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'description_about.en' => ValidationRuleHelper::longTextRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'description_about.fr' => ValidationRuleHelper::longTextRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'description_about.de' => ValidationRuleHelper::longTextRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'description_about.pl' => ValidationRuleHelper::longTextRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'description_about.ru' => ValidationRuleHelper::longTextRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'description_about.zh' => ValidationRuleHelper::longTextRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'description_about.tr' => ValidationRuleHelper::longTextRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'description_about.nl' => ValidationRuleHelper::longTextRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),



            'description_mission' => 'array|between:9,9',
            'description_mission.ar' => ValidationRuleHelper::longTextRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'description_mission.en' => ValidationRuleHelper::longTextRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'description_mission.fr' => ValidationRuleHelper::longTextRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'description_mission.de' => ValidationRuleHelper::longTextRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'description_mission.pl' => ValidationRuleHelper::longTextRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'description_mission.ru' => ValidationRuleHelper::longTextRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'description_mission.zh' => ValidationRuleHelper::longTextRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'description_mission.tr' => ValidationRuleHelper::longTextRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'description_mission.nl' => ValidationRuleHelper::longTextRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),


            'description_vision' => 'array|between:9,9',
            'description_vision.ar' => ValidationRuleHelper::longTextRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'description_vision.en' => ValidationRuleHelper::longTextRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'description_vision.fr' => ValidationRuleHelper::longTextRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'description_vision.de' => ValidationRuleHelper::longTextRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'description_vision.pl' => ValidationRuleHelper::longTextRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'description_vision.ru' => ValidationRuleHelper::longTextRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'description_vision.zh' => ValidationRuleHelper::longTextRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'description_vision.tr' => ValidationRuleHelper::longTextRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'description_vision.nl' => ValidationRuleHelper::longTextRules([
                'required' => $inUpdate ? 'sometimes' : 'required',
            ]),
            'about_us_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'title_about.ar.regex' => 'Text must not contain symbols !',
            'title_about.en.regex' => 'Text must not contain symbols !',
            'title_about.fr.regex' => 'Text must not contain symbols !',
            'title_about.de.regex' => 'Text must not contain symbols !',
            'title_about.tr.regex' => 'Text must not contain symbols !',
            'title_about.pl.regex' => 'Text must not contain symbols !',
            'title_about.ru.regex' => 'Text must not contain symbols !',
            'title_about.zh.regex' => 'Text must not contain symbols !',
            'title_about.nl.regex' => 'Text must not contain symbols !',

            'title_mission.ar.regex' => 'Text must not contain symbols !',
            'title_mission.en.regex' => 'Text must not contain symbols !',
            'title_mission.fr.regex' => 'Text must not contain symbols !',
            'title_mission.de.regex' => 'Text must not contain symbols !',
            'title_mission.pl.regex' => 'Text must not contain symbols !',
            'title_mission.ru.regex' => 'Text must not contain symbols !',
            'title_mission.zh.regex' => 'Text must not contain symbols !',
            'title_mission.tr.regex' => 'Text must not contain symbols !',
            'title_mission.nl.regex' => 'Text must not contain symbols !',

            'title_vision.ar.regex' => 'Text must not contain symbols !',
            'title_vision.en.regex' => 'Text must not contain symbols !',
            'title_vision.fr.regex' => 'Text must not contain symbols !',
            'title_vision.de.regex' => 'Text must not contain symbols !',
            'title_vision.pl.regex' => 'Text must not contain symbols !',
            'title_vision.ru.regex' => 'Text must not contain symbols !',
            'title_vision.zh.regex' => 'Text must not contain symbols !',
            'title_vision.tr.regex' => 'Text must not contain symbols !',
            'title_vision.nl.regex' => 'Text must not contain symbols !',

            'description_about.ar.regex' => 'Text must not contain symbols !',
            'description_about.en.regex' => 'Text must not contain symbols !',
            'description_about.fr.regex' => 'Text must not contain symbols !',
            'description_about.de.regex' => 'Text must not contain symbols !',
            'description_about.pl.regex' => 'Text must not contain symbols !',
            'description_about.ru.regex' => 'Text must not contain symbols !',
            'description_about.zh.regex' => 'Text must not contain symbols !',
            'description_about.tr.regex' => 'Text must not contain symbols !',
            'description_about.nl.regex' => 'Text must not contain symbols !',

            'description_mission.ar.regex' => 'Text must not contain symbols !',
            'description_mission.en.regex' => 'Text must not contain symbols !',
            'description_mission.fr.regex' => 'Text must not contain symbols !',
            'description_mission.de.regex' => 'Text must not contain symbols !',
            'description_mission.pl.regex' => 'Text must not contain symbols !',
            'description_mission.ru.regex' => 'Text must not contain symbols !',
            'description_mission.zh.regex' => 'Text must not contain symbols !',
            'description_mission.tr.regex' => 'Text must not contain symbols !',
            'description_mission.nl.regex' => 'Text must not contain symbols !',

            'description_vision.ar.regex' => 'Text must not contain symbols !',
            'description_vision.en.regex' => 'Text must not contain symbols !',
            'description_vision.fr.regex' => 'Text must not contain symbols !',
            'description_vision.de.regex' => 'Text must not contain symbols !',
            'description_vision.pl.regex' => 'Text must not contain symbols !',
            'description_vision.ru.regex' => 'Text must not contain symbols !',
            'description_vision.zh.regex' => 'Text must not contain symbols !',
            'description_vision.tr.regex' => 'Text must not contain symbols !',
            'description_vision.nl.regex' => 'Text must not contain symbols !',
        ];
    }
}
