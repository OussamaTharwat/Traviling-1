<?php

namespace Modules\Auth\Http\Controllers;

use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Auth\Http\Requests\SocialAuthRequest;
use Modules\Auth\Services\SocialiteService;
use Modules\Auth\Services\UserService;
use Modules\Auth\Transformers\UserResource;

class UserController extends Controller
{
    use HttpResponse;

    public function __construct(private readonly UserService $userService) {}

    public function users(Request $request)
    {
        $user = $this->userService->index($request->validated());

        return $this->okResponse(UserResource::make($user), message: translate_word('logged_in'));
    }
}
