<?php

namespace Database\Seeders\Meeting;

use App\Enums\MeetingStatusEnum;
use App\Models\Meeting\Meeting;
use App\Models\User\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MeetingSeeder extends Seeder
{
    public function run(): void
    {
        Meeting::query()->create([
            'title' => '“Об эмоциях по-честному”',
            'date_start' => Carbon::now()->subDay(),
            'specialist_id' => User::query()->where((new User())->getTable() . '.email', '=', 'specialist-irina@gmail.com')->firstOrFail()->id,
            'status' => MeetingStatusEnum::finished->value,
            'broadcast_link' => 'link',
        ]);

        Meeting::query()->create([
            'title' => '“Почему вы не худеете?”',
            'date_start' => Carbon::now(),
            'specialist_id' => User::query()->where((new User())->getTable() . '.email', '=', 'specialist-elena@gmail.com')->firstOrFail()->id,
            'status' => MeetingStatusEnum::in_progress->value,
            'broadcast_link' => 'link',
        ]);

        Meeting::query()->create([
            'title' => '“Фазы сна. От и до”',
            'date_start' => Carbon::now()->addDay(),
            'specialist_id' => User::query()->where((new User())->getTable() . '.email', '=', 'specialist-moderator@gmail.com')->firstOrFail()->id,
            'status' => MeetingStatusEnum::not_started->value,
            'broadcast_link' => 'link',
        ]);
    }
}
