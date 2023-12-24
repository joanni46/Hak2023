<?php

namespace App\Actions\Meeting;

use App\Models\Meeting\Meeting;

final class DeleteMeetingAction
{
    public function execute(int $id): void
    {
        Meeting::query()->findOrFail($id)->delete();
    }
}
