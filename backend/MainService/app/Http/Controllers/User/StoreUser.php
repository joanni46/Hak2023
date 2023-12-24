<?php

namespace App\Http\Controllers\User;

use App\Actions\User\StoreUserAction;
use App\DataTransferObjects\User\input\StoreUserDTO as InputStoreUserDTO;
use App\Http\Controllers\Controller;
use App\Transformers\User\UserTransformer;
use Illuminate\Http\JsonResponse;

final class StoreUser extends Controller
{
    public function __invoke(InputStoreUserDTO $dto, StoreUserAction $action): JsonResponse
    {
        $user = $action->execute($dto);

        return responder()
            ->success($user, new UserTransformer())
            ->with(['profile'])
            ->respond();
    }
}
