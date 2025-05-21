<?php

namespace Modules\Auth\Http\Controllers;

use App\Traits\HttpResponse;
use Illuminate\Routing\Controller;
use Modules\Auth\Actions\Register\UserRegister;
use Modules\Auth\Http\Requests\Register\UserRegisterRequest;
use Modules\Auth\Strategies\Verifiable;

class RegisterController extends Controller
{
    use HttpResponse;

    public function user(UserRegisterRequest $request, UserRegister $normalUserRegister, Verifiable $verifiable)
    {
        $result = $normalUserRegister->handle($request->validated(), $verifiable);

        $data = app()->environment('local') ? ['otp' => $result['otp']] : [];

        return $this->createdResponse(
            data: $data,
            message: translate_success_message('user', 'created') . ' ' . translate_word('user_verification_sent')
        );
    }


}
