<?php

namespace Modules\Auth\Transformers;

use App\Helpers\ResourceHelper;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Auth\Enums\AuthEnum;
use Modules\Auth\Enums\UserTypeEnum;
use Modules\Auth\Transformers\Accountant\UserAccountantPostgraduateStudyResource;
use Modules\Auth\Transformers\Accountant\UserEducationResource;
use Modules\Auth\Transformers\Accountant\UserFieldOfWorkResource;
use Modules\Auth\Transformers\Accountant\UserLanguageResource;
use Modules\Auth\Transformers\Accountant\UserProfessionalCertificationResource;
use Modules\Auth\Transformers\Accountant\UserSkillResource;
use Modules\Auth\Transformers\Accountant\UserStrengtheningCourseResource;
use Modules\Auth\Transformers\Accountant\UserWorkPreferenceResource;
use Modules\Auth\Transformers\UserEducationResource as TransformersUserEducationResource;
use Modules\Country\Transformers\CountryResource;
use Modules\Nationality\Transformers\NationalityResource;
use Modules\Role\Transformers\RoleResource;

class SmallResource extends JsonResource
{
    /**
     * @throws \Exception
     */
    public function toArray($request): array
    {

        return [
            'id' => $this->id,
            'name' => $this->whenHas('name'),
            'reaction' => $this->when(! is_null($this->pivot), function () {
                return $this->pivot->value;
            }),
            AuthEnum::UNIQUE_COLUMN => $this->whenHas(AuthEnum::UNIQUE_COLUMN),
            'phone' => $this->whenHas('phone'),
            'avatar' => $this->whenNotNull($this->getAvatar($request->url())),
            'type' => $this->whenHas('type'),
            'status' => $this->whenHas('status'),
            'location' => $this->whenHas('location'),
            'reached_company' => $this->whenHas('reached_company'),
            'reached_instructor' => $this->whenHas('reached_instructor'),
            'reached_accountant' => $this->whenHas('reached_accountant'),
            'reached_certified' => $this->whenHas('reached_certified'),
            'reached_interviewer' => $this->whenHas('reached_interviewer'),
            'reached_interviewer' => $this->whenHas('reached_interviewer'),
            'expected_salary' => $this->whenHas('expected_salary'),
            'rate' => $this->rate ?? 0,
            'nationality_id'=> $this->whenHas('nationality_id'),
            'country_id'=> $this->whenHas('counter_id')
        ];
    }

    /**
     * @throws \Exception
     */
    private function getAvatar($url)
    {
        return ResourceHelper::getFirstMediaOriginalUrl(
            $this,
            AuthEnum::AVATAR_RELATIONSHIP_NAME,
            'user.png'
        );
    }
}
