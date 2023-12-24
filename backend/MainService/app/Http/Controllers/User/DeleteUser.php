<?php

namespace App\Http\Controllers\User;

use App\Actions\User\DeleteUserAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

final class DeleteUser extends Controller
{
    public function __invoke(int $id, DeleteUserAction $action): JsonResponse
    {
        $action->execute($id);

        return responder()
            ->success(['message' => 'success'])
            ->respond();
    }
}
