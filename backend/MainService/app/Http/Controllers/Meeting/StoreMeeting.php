<?php

namespace App\Http\Controllers\Meeting;

use App\Actions\Meeting\StoreMeetingAction;
use App\DataTransferObjects\Meeting\input\StoreMeetingDTO as InputStoreMeetingDTO;
use App\Http\Controllers\Controller;
use App\Transformers\Meeting\MeetingTransformer;
use Illuminate\Http\JsonResponse;

final class StoreMeeting extends Controller
{
    public function __invoke(InputStoreMeetingDTO $dto): JsonResponse
    {
        $meeting = StoreMeetingAction::run($dto);

        return responder()
            ->success($meeting, new MeetingTransformer())
            ->with(['specialist.profile'])
            ->respond();
    }
}
