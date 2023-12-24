<?php

namespace App\Http\Controllers\User;

use App\Actions\User\UpdateUserAction;
use App\DataTransferObjects\User\input\UpdateUserDTO as InputUpdateUserDTO;
use App\Http\Controllers\Controller;
use App\Transformers\User\UserTransformer;
use Illuminate\Http\JsonResponse;

final class UpdateUser extends Controller
{
    public function __invoke(InputUpdateUserDTO $dto, UpdateUserAction $action): JsonResponse
    {
        $user = $action->execute($dto);

        return responder()
            ->success($user, new UserTransformer())
            ->with(['profile'])
            ->respond();
    }
}
