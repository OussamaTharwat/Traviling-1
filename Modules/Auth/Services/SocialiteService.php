<?php

namespace Modules\Auth\Services;

use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Laravel\Socialite\Facades\Socialite;
use Modules\Auth\Actions\Register\UserRegister;
use Modules\Auth\Enums\AuthEnum;
use Modules\Auth\Enums\UserTypeEnum;
use Modules\Auth\Exceptions\SocialAuthException;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileCannotBeAdded;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class SocialiteService
{
    /**
     * @throws FileCannotBeAdded
     * @throws FileIsTooBig
     * @throws FileDoesNotExist|SocialAuthException
     */
    public function handleProviderCallback(array $data)
    {
        $requestProvider = $data['provider'];
        $accessToken = $data['access_token'];

        try {
            $user = Socialite::driver($requestProvider)->stateless()->userFromToken($accessToken);
        } catch (Exception $_) {
            SocialAuthException::invalidCredentials();
        }

        $email = $user->getEmail();

        if (! $email) {
            SocialAuthException::invalidEmail();
        }

        $existingUser = User::query()
            ->where('email', $user->getEmail())
            ->first();

            if (! $existingUser) {
                $existingUser = User::create([
                    'email' => $email,
                    'name' => $user->getName() ?: explode('@', $email)[0],
                    'password' => null,
                    'type'=>UserTypeEnum::USER,
                    'social_provider' => $requestProvider,
                    AuthEnum::VERIFIED_AT => now(),
                ]);

                $existingUser = User::whereId($existingUser->id)->first();

                if ($user->getAvatar()) {
                    $avatar = $existingUser
                        ->addMediaFromUrl($user->getAvatar())
                        ->toMediaCollection(AuthEnum::AVATAR_COLLECTION_NAME);

                    $existingUser = User::whereId($existingUser->id)->first();

                    $existingUser->setRelation('avatar', new Collection([$avatar]));
                }


            }

        // $user->loadMissing('avatar');

        LoginService::addBearerToken($existingUser);

        return $existingUser;
    }

    private function addMediaFromUrl($user, $existingUser): void
    {
        if ($user->getAvatar()) {
            $avatar = $existingUser
                ->addMediaFromUrl($user->getAvatar())
                ->toMediaCollection(AuthEnum::AVATAR_COLLECTION_NAME);

            $existingUser->setRelation('avatar', new Collection([$avatar]));
        }
    }
}
