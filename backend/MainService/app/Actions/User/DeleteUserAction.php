<?php

namespace App\Actions\User;

use App\Models\User\User;

final class DeleteUserAction
{
    public function execute(int $id): void
    {
        User::query()->findOrFail($id)->delete();
    }
}
