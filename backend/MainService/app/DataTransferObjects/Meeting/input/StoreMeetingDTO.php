<?php

namespace App\DataTransferObjects\Meeting\input;

use Spatie\LaravelData\Data;

final class StoreMeetingDTO extends Data
{
    public function __construct(
        public string $title,
        public string $date_start,
        public string $specialist_id,
        public string $broadcast_link,
    ) {}
}
