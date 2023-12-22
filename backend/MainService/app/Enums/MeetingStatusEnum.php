<?php

namespace App\Enums;

enum MeetingStatusEnum: string
{
    case not_started = 'not_started';
    case in_progress = 'in_progress';
    case finished = 'finished';
}
