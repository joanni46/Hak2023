<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\Meeting\MeetingSeeder;
use Database\Seeders\User\UserProfileSeeder;
use Database\Seeders\User\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            UserProfileSeeder::class,
            MeetingSeeder::class,
        ]);
    }
}
