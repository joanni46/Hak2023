<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\Common\RoleSeeder;
use Database\Seeders\Meeting\MeetingSeeder;
use Database\Seeders\User\UserProfileSeeder;
use Database\Seeders\User\UserSeeder;
use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            UserProfileSeeder::class,
            MeetingSeeder::class,
        ]);
    }
}
