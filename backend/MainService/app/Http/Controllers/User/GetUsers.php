<?php

namespace App\Http\Controllers\User;

use App\Actions\User\GetUsersAction;
use App\DataTransferObjects\User\input\GetUsersDTO as InputGetUsersDTO;
use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\JsonResponse;

final class GetUsers extends Controller
{
    public function __invoke(InputGetUsersDTO $dto, GetUsersAction $action): JsonResponse
    {
        $users = $action->execute($dto);

        return responder()
            ->success($users, new User())
            ->with(['profile'])
            ->respond();
    }
}
