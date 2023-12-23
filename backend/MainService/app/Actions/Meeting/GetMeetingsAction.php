<?php

namespace app\Actions\Meeting;

use App\DataTransferObjects\Meeting\input\GetMeetingsDTO;
use App\Models\Meeting\Meeting;
use Illuminate\Pagination\LengthAwarePaginator;

final class GetMeetingsAction
{
    public function execute(GetMeetingsDTO $dto): LengthAwarePaginator
    {
        return Meeting::query()->paginate(page: $dto->page, perPage: $dto->perPage);
    }
}
