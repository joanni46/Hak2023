<?php

namespace App\Actions\User;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Model;

final class GetUserAction
{
    public function execute(int $id): Model|User
    {
        return User::query()->findOrFail($id);
    }
}
