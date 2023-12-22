<?php

namespace Database\Seeders\User;

use App\Models\User\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->create([
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin')
        ]);

        User::query()->create([
            'email' => 'moderator@gmail.com',
            'password' => bcrypt('moderator')
        ]);

        User::query()->create([
            'email' => 'irina@gmail.com',
            'password' => bcrypt('irina')
        ]);

        User::query()->create([
            'email' => 'elena@gmail.com',
            'password' => bcrypt('elena')
        ]);

        User::query()->create([
            'email' => 'oleg@gmail.com',
            'password' => bcrypt('oleg')
        ]);
    }
}
