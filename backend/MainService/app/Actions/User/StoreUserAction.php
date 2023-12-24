<?php

namespace App\Actions\User;

use App\DataTransferObjects\User\input\StoreUserDTO as InputStoreUserDTO;
use App\Models\User\User;

final class StoreUserAction
{
    public function execute(InputStoreUserDTO $dto): User
    {
        /** @var User $user */
        $user = User::query()->create([
            'email' => $dto->email,
            'password' => $dto->password,
        ]);

        $user->profile()->create([
           'position' => $dto->position,
           'first_name' => $dto->first_name,
           'last_name' => $dto->last_name,
           'middle_name' => $dto->middle_name,
           'image' => $dto->image,
           'bio' => $dto->bio,
        ]);

        return $user;
    }
}
