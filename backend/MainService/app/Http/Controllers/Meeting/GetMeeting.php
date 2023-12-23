<?php

namespace app\Http\Controllers\Meeting;

use App\Actions\Meeting\GetMeetingAction;
use App\Http\Controllers\Controller;
use App\Transformers\Meeting\MeetingTransformer;
use Illuminate\Http\JsonResponse;

final class GetMeeting extends Controller
{
    public function __invoke(int $id, GetMeetingAction $action): JsonResponse
    {
        $meeting = $action->execute($id);

        return responder()
            ->success($meeting, new MeetingTransformer())
            ->with(['specialist.profile'])
            ->respond();
    }
}
