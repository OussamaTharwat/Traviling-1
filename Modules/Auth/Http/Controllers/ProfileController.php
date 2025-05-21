<?php

namespace Modules\Auth\Http\Controllers;

use App\Exceptions\ValidationErrorsException;
use App\Models\User;
use App\Models\UserExperience;
use App\Traits\HttpResponse;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Modules\Auth\Enums\AuthEnum;
use Modules\Auth\Http\Requests\DeleteUserRequest;
use Modules\Auth\Http\Requests\ProfessionalCertificationRequest;
use Modules\Auth\Http\Requests\ProfessionalCertifications;
use Modules\Auth\Http\Requests\ProfileRequest;
use Modules\Auth\Http\Requests\SocialMediaRequest;
use Modules\Auth\Http\Requests\UpdateEducationRequest;
use Modules\Auth\Http\Requests\UpdateExperienceRequest;
use Modules\Auth\Http\Requests\UpdateLocaleRequest;
use Modules\Auth\Http\Requests\UpdateLocationRequest;
use Modules\Auth\Http\Requests\UserAccountantPostgraduateStudyRequest;
use Modules\Auth\Http\Requests\UserEducationRequest;
use Modules\Auth\Http\Requests\UserFieldOfWorkRequest;
use Modules\Auth\Http\Requests\UserFiledOfWorkRequest;
use Modules\Auth\Http\Requests\UserLanguageRequest;
use Modules\Auth\Http\Requests\UserSkillRequest;
use Modules\Auth\Http\Requests\UserStrengtheningCourseRequest;
use Modules\Auth\Http\Requests\UserWorkExperienceRequest;
use Modules\Auth\Http\Requests\WorkPreferenceRequest;
use Modules\Auth\Services\ProfileService;
use Modules\Auth\Transformers\UserResource;
use Modules\Education\Http\Requests\EducationRequest;

class ProfileController extends Controller
{
    use HttpResponse;

    public static function getUsersCollectionName(): string
    {
        return AuthEnum::AVATAR_COLLECTION_NAME;
    }
    /**
     * @throws ValidationErrorsException
     */
    public function handle(ProfileRequest $request, ProfileService $profileService): JsonResponse
    {
        $result = $profileService->handle($request->validated());

        $msg = translate_success_message('profile', 'updated');

        if (isset($result['verified'])) {
            $msg .= ' and sms verification sent';
        }

        if (is_bool($result) || isset($result['verified'])) {
            return $this->okResponse(message: $msg);
        }

        return $this->validationErrorsResponse($result);
    }
    public function deleteAccount(DeleteUserRequest $request)
    {
        try {
            $loggedUserInfo = User::whereId(auth()->id())->first();
            auth()->user()->delete();
        } catch (Exception $e) {
            return $this->errorResponse(message: $e->getMessage());
        }
        return $this->okResponse(message: __("account deleted successfully"));
    }
    public function show()
    {
        $loggedUserInfo = User::whereId(auth()->id())->with(['avatar'])->first();

        return $this->resourceResponse(new UserResource($loggedUserInfo));
    }
    public function updateLocale(UpdateLocaleRequest $request): JsonResponse
    {
        try {
            auth()->user()->forceFill($request->validated())->save();
        } catch (Exception $e) {
            return $this->errorResponse(message: $e->getMessage());
        }
        return $this->okResponse(message: translate_success_message('profile', 'updated'), showToast: false);
    }
    

}
