<?php

namespace app\Http\Controllers\Meeting;

use App\Actions\Meeting\GetMeetingAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

final class GetMeeting extends Controller
{
    public function __invoke(int $id, GetMeetingAction $action): JsonResponse
    {
        $meeting = $action->execute($id);

        return responder()->success($meeting)->respond();
    }
}
