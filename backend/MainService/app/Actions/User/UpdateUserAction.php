<?php

namespace App\Actions\User;

use App\DataTransferObjects\User\input\UpdateUserDTO as InputUpdateUserDTO;
use App\Models\User\User;

final class UpdateUserAction
{
    public function execute(int $id, InputUpdateUserDTO $dto): User
    {
        /** @var User $user */
        $user = User::query()->findOrFail($id);

        $user->update([
            'email' => $dto->email ?: $user->email,
            'password' => $dto->password ?: $user->password,
        ]);

        $user->profile()->update([
           'position' => $dto->position ?: $user->profile->position,
           'first_name' => $dto->first_name ?: $user->profile->first_name,
           'last_name' => $dto->last_name ?: $user->profile->last_name,
           'middle_name' => $dto->middle_name ?: $user->profile->middle_name,
           'image' => $dto->image ?: $user->profile->image,
           'bio' => $dto->bio ?: $user->profile->bio,
        ]);

        return $user;
    }
}
