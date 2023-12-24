<?php

namespace App\Http\Controllers\Meeting;

use App\Actions\Meeting\DeleteMeetingAction;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

final class DeleteMeeting extends Controller
{
    public function __invoke(int $id, DeleteMeetingAction $action): JsonResponse
    {
        $action->execute($id);

        return responder()
            ->success(['message' => 'success'])
            ->respond();
    }
}
