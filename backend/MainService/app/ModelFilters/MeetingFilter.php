<?php

namespace App\ModelFilters;

use App\Models\Meeting\Meeting;
use EloquentFilter\ModelFilter;

class MeetingFilter extends ModelFilter
{
    public function status(string $status): self
    {
        return $this->where(Meeting::getTableName() . '.status', '=', $status);
    }

    public function dateStartFrom(string $dateStart): self
    {
        return $this->where(Meeting::getTableName() . '.date_start', '>', $dateStart);
    }

    public function dateStartTo(string $dateStart): self
    {
        return $this->where(Meeting::getTableName() . '.date_start', '<', $dateStart);
    }
}
