<?php

namespace App\Actions\Meeting;

use App\DataTransferObjects\Meeting\input\StoreMeetingDTO;
use App\Enums\MeetingStatusEnum;
use App\Models\Meeting\Meeting;
use App\Traits\Kernel\Executable;
use Illuminate\Auth\AuthManager;

final class StoreMeetingAction
{
    use Executable;

    public function __construct(private readonly AuthManager $authentication) {}

    public function execute(StoreMeetingDTO $dto): Meeting
    {
        $meeting = new Meeting();
        $meeting->title = $dto->title;
        $meeting->date_start = $dto->date_start;
        $meeting->specialist_id = $this->authentication->id();
        $meeting->status = MeetingStatusEnum::not_started->value;
        $meeting->broadcast_link = $dto->broadcast_link;
        $meeting->save();

        return $meeting;
    }
}
