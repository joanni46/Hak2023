<?php

namespace Database\Seeders\User;

use App\Models\User\User;
use Illuminate\Database\Seeder;

class UserProfileSeeder extends Seeder
{
    public function run(): void
    {
        /** @var User $admin */
        $admin = User::query()->where((new User())->getTable() . '.email', '=', 'admin@gmail.com')->firstOrFail();

        $admin->profile()->create([
            'first_name' => 'admin',
        ]);

        /** @var User $moderator */
        $moderator = User::query()->where((new User())->getTable() . '.email', '=', 'moderator@gmail.com')->firstOrFail();

        $moderator->profile()->create([
            'first_name' => 'moderator',
        ]);

        /** @var User $irina */
        $irina = User::query()->where((new User())->getTable() . '.email', '=', 'irina@gmail.com')->firstOrFail();

        $irina->profile()->create([
            'first_name' => 'Ирина',
            'last_name' => 'Аксионова',
        ]);

        /** @var User $elena */
        $elena = User::query()->where((new User())->getTable() . '.email', '=', 'elena@gmail.com')->firstOrFail();

        $elena->profile()->create([
            'first_name' => 'Елена',
            'last_name' => 'Иванова',
        ]);

        /** @var User $oleg */
        $oleg = User::query()->where((new User())->getTable() . '.email', '=', 'oleg@gmail.com')->firstOrFail();

        $oleg->profile()->create([
            'first_name' => 'Олег',
            'last_name' => 'Зубков',
        ]);
    }
}
