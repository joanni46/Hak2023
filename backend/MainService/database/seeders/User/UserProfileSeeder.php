<?php

namespace Database\Seeders\User;

use App\Models\User\User;
use Illuminate\Database\Seeder;

final class UserProfileSeeder extends Seeder
{
    public function run(): void
    {
        /** @var User $admin */
        $admin = User::query()->where(User::getTableName() . '.email', '=', 'admin@gmail.com')->firstOrFail();

        $admin->profile()->create([
            'first_name' => 'admin',
        ]);

        /** @var User $moderator */
        $moderator = User::query()->where(User::getTableName() . '.email', '=', 'specialist-moderator@gmail.com')->firstOrFail();

        $moderator->profile()->create([
            'first_name' => 'moderator',
            'position' => 'Сомнолог',
        ]);

        /** @var User $irina */
        $irina = User::query()->where(User::getTableName() . '.email', '=', 'specialist-irina@gmail.com')->firstOrFail();

        $irina->profile()->create([
            'first_name' => 'Ирина',
            'last_name' => 'Аксионова',
            'position' => 'Психолог',
        ]);

        /** @var User $elena */
        $elena = User::query()->where(User::getTableName() . '.email', '=', 'specialist-elena@gmail.com')->firstOrFail();

        $elena->profile()->create([
            'first_name' => 'Елена',
            'last_name' => 'Иванова',
            'position' => 'Психолог',
        ]);

        /** @var User $oleg */
        $oleg = User::query()->where(User::getTableName() . '.email', '=', 'employer-oleg@gmail.com')->firstOrFail();

        $oleg->profile()->create([
            'first_name' => 'Олег',
            'last_name' => 'Зубков',
        ]);
    }
}
