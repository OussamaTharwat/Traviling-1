<?php

namespace Modules\Auth\Actions\Register;

use App\Models\User;
use Closure;
use Illuminate\Support\Facades\DB;
use Modules\Auth\Enums\AuthEnum;
use Modules\Auth\Enums\UserTypeEnum;
use Modules\Auth\Services\UserService;
use Modules\Auth\Strategies\Verifiable;

class UserRegister
{
    public function handle(array $data, Verifiable $verifiable, ?Closure $closure = null, bool $shouldVerify = true)
    {
        $errors = [];

        return DB::transaction(function () use ($data, $closure, &$errors, $verifiable, $shouldVerify) {

            if (isset($data['phone'])) {
                UserService::columnExists($data['phone']);
            }

            if (isset($data['email'])) {
                UserService::columnExists($data['email'], columnName: 'email', errorKey: 'email');
            }

            $user = User::create($data + [
                'type' => UserTypeEnum::TOURIST,
                'status' => !$shouldVerify,
                AuthEnum::VERIFIED_AT => $shouldVerify ? null : now(),
            ]);

            if ($closure) {
                $closure($user, $errors, $data);
            }

            if ($shouldVerify) {
                $otp = $verifiable->sendCodeWithReturn($user); // نرجع الكود المرسل
            }

            return [
                'user' => $user,
                'otp' => isset($otp) ? $otp : null  // Return the OTP if sent
            ];
        });
    }
}
