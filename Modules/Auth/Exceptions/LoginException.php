<?php

namespace Modules\Auth\Exceptions;

use App\Exceptions\BaseExceptionClass;
use App\Traits\HttpResponse;

class LoginException extends BaseExceptionClass
{
    use HttpResponse;

    /**
     * @throws LoginException
     */
    public static function wrongCredentials(): self
    {
        throw new self(
            translate_word('wrong_credentials'),
            422
        );
    }

    /**
     * @throws LoginException
     */
    public static function notVerified(): self
    {
        throw new self(
            translate_word('account_not_verified'),
            409
        );
    }

    /**
     * @throws LoginException
     */
    public static function blockedAccount()
    {
        throw new self(
            translate_word('blocked_account'),
            403
        );
    }

    public function render($request)
    {
        return response()->json([
            'message' => $this->getMessage(),
            'type' => 'error',
            'code' => $this->getCode() ?: 400,
            'showToast' => true,
        ], $this->getCode() ?: 400);
    }
}
