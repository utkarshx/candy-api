<?php

namespace GetCandy\Api\Http\Controllers\Auth;

use GetCandy\Api\Http\Controllers\BaseController;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use GetCandy\Api\Http\Requests\Auth\ResetAccountPasswordRequest;
use Illuminate\Support\Facades\Password;

class AccountController extends BaseController
{
   public function resetPassword(ResetAccountPasswordRequest $request)
   {
        $result = app('api')->users()->resetPassword($request->current_password, $request->password, $request->user());

        if (!$result) {
            return $this->errorForbidden();
        }

        return $this->respondWithSuccess('Password changed');
   }
}
