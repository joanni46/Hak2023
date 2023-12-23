<?php

namespace app\Actions\Meeting;

use App\Models\Meeting\Meeting;

final class GetMeetingAction
{
    public function execute(int $id): Meeting
    {
        return Meeting::query()->findOrFail($id);
    }
}
