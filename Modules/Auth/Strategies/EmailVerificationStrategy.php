<?php

namespace Modules\Auth\Strategies;

use App\Exceptions\ValidationErrorsException;
use Illuminate\Support\Facades\Mail;
use Modules\Auth\Abstracts\AbstractVerifyUser;
use Modules\Auth\Emails\VerifyUserEmail;
use Modules\Auth\Enums\VerifyTokenTypeEnum;

class EmailVerificationStrategy extends AbstractVerifyUser implements Verifiable
{
    /**
     * @throws ValidationErrorsException
     */
    public function verifyCode($handle, $code): void
    {
        $this->generalVerifyCode($handle, $code);
    }

    /**
     * Send the verification code to the user via email.
     *
     * @throws ValidationErrorsException
     */
    public function sendCode($handle): void
    {
        // Call sendCodeWithReturn to generate and send the OTP.
        $this->sendCodeWithReturn($handle);
    }

    /**
     * @throws ValidationErrorsException
     */
    public function sendCodeWithReturn($handle): string
    {
        [$user, $code] = $this->generalSendCode($handle);

        Mail::to($user->{$user->getUniqueColumnValue()}, $user->name)
            ->send(new VerifyUserEmail([
                'code' => $code,
                'expire_after' => self::verificationTokenExpiryHours(),
            ]));

        return $code;
    }


    /**
     * @throws ValidationErrorsException
     */
    public function forgetPassword($handle): array
    {
        [$user, $code] = $this->generalSendCode($handle, VerifyTokenTypeEnum::PASSWORD_RESET);
        $email = $user->{$user->getUniqueColumnValue()};
        $message = "Your OTP code is: {$code}. It will expire in " . self::verificationTokenExpiryHours() . " hours.";
        Mail::to($email, $user->name)->send(new VerifyUserEmail([
            'code' => $code,
            'expire_after' => self::verificationTokenExpiryHours(),
        ], 'auth::forgot-password', 'Reset Password'));
        return [
            'otp' => $code,
            'message' => translate_word('forgot_password_sent'),
        ];
    }



    /**
     * @throws ValidationErrorsException
     */
    public function resetPassword($handle, $code, $newPassword): void
    {
        $user = $this->generalVerifyCode($handle, $code, VerifyTokenTypeEnum::PASSWORD_RESET);

        $user->forceFill([
            'password' => $newPassword,
        ])->save();
    }
}
