<?php

namespace App\Actions\Meeting;

use App\Models\Meeting\Meeting;
use Illuminate\Database\Eloquent\Model;

final class GetMeetingAction
{
    public function execute(int $id): Model|Meeting
    {
        return Meeting::query()->findOrFail($id);
    }
}
