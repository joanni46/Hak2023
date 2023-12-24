<?php

namespace App\Http\Controllers\User;

use App\Actions\User\GetUserAction;
use App\Http\Controllers\Controller;
use App\Transformers\User\UserTransformer;
use Illuminate\Http\JsonResponse;

final class GetUser extends Controller
{
    public function __invoke(int $id, GetUserAction $action): JsonResponse
    {
        $user = $action->execute($id);

        return responder()
            ->success($user, new UserTransformer())
            ->with(['profile'])
            ->respond();
    }
}
