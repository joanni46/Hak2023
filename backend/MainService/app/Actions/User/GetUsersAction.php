<?php

namespace App\Actions\User;

use App\DataTransferObjects\User\input\GetUsersDTO;
use App\Models\User\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

final class GetUsersAction
{
    public function execute(GetUsersDTO $dto): LengthAwarePaginator
    {
        return User::query()->paginate(perPage: $dto->perPage, page: $dto->page);
    }
}
