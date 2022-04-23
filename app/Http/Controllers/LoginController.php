<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Requests\UserLoginRequest;
use App\Exceptions\UserNotFoundException;
use App\Http\Resources\UserResource;
use App\Services\User\UserAuthentication;

class LoginController extends Controller
{
    use ApiResponser;

    public function login(UserLoginRequest $request, UserAuthentication $userAuthentication)
    {
        try {
            $user = $userAuthentication->login($request->email, $request->password);
            return $this->success(200, new UserResource($user));
        } catch (UserNotFoundException $e) {
            return $this->error(404, $e->getMessage());
        }
    }
}
