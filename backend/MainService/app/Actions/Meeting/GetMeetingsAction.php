<?php

namespace App\Actions\Meeting;

use App\DataTransferObjects\Meeting\input\GetMeetingsDTO;
use App\Models\Meeting\Meeting;
use Illuminate\Pagination\LengthAwarePaginator;

final class GetMeetingsAction
{
    public function execute(GetMeetingsDTO $dto): LengthAwarePaginator
    {
        return Meeting::query()
            ->filter($dto->filter)
            ->paginate(perPage: $dto->perPage, page: $dto->page);
    }
}
