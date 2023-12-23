<?php

namespace app\Http\Controllers\Meeting;

use App\Actions\Meeting\GetMeetingsAction;
use App\DataTransferObjects\Meeting\input\GetMeetingsDTO;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

final class GetMeetings extends Controller
{
    public function __invoke(GetMeetingsDTO $dto, GetMeetingsAction $action): JsonResponse
    {
        $meeting = $action->execute($dto);

        return responder()->success($meeting)->respond();
    }
}
