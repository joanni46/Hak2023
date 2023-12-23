<?php

namespace Database\Seeders\User;

use App\Models\User\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::query()->make([
            'email' => 'admin@gmail.com',
            'password' => (string) bcrypt('admin')
        ])->save();

        User::query()->create([
            'email' => 'moderator@gmail.com',
            'password' => (string) bcrypt('moderator')
        ]);

        User::query()->create([
            'email' => 'irina@gmail.com',
            'password' => (string) bcrypt('irina')
        ]);

        User::query()->create([
            'email' => 'elena@gmail.com',
            'password' => (string) bcrypt('elena')
        ]);

        User::query()->create([
            'email' => 'oleg@gmail.com',
            'password' => (string) bcrypt('oleg')
        ]);
    }
}
