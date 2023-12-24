<?php

namespace App\Http\Controllers\Meeting;

use App\Actions\Meeting\StoreMeetingAction;
use App\DataTransferObjects\Meeting\input\StoreMeetingDTO;
use App\Http\Controllers\Controller;
use App\Transformers\Meeting\MeetingTransformer;
use Illuminate\Http\JsonResponse;

final class StoreMeeting extends Controller
{
    public function __invoke(StoreMeetingDTO $dto, StoreMeetingAction $action): JsonResponse
    {
        $meeting = $action->execute($dto);

        return responder()
            ->success($meeting, new MeetingTransformer())
            ->with(['specialist.profile'])
            ->respond();
    }
}
