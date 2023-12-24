<?php

namespace Database\Seeders\User;

use App\Enums\RoleEnum;
use App\Models\Common\Role;
use App\Models\User\User;
use Illuminate\Database\Seeder;

final class UserSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::query()->where(Role::getTableName() . '.name', '=', RoleEnum::Admin->value)->firstOrFail();
        $specialistRole = Role::query()->where(Role::getTableName() . '.name', '=', RoleEnum::Specialist->value)->firstOrFail();
        $employerRole = Role::query()->where(Role::getTableName() . '.name', '=', RoleEnum::Employer->value)->firstOrFail();

        /** @var User $admin */
        $admin = User::query()->create([
            'email' => 'admin@gmail.com',
            'password' => (string) bcrypt('admin')
        ]);
        $admin->roles()->attach($adminRole);

        $specialist = User::query()->create([
            'email' => 'specialist-moderator@gmail.com',
            'password' => (string) bcrypt('moderator')
        ]);
        $specialist->roles()->attach($specialistRole);

        $specialist = User::query()->create([
            'email' => 'specialist-irina@gmail.com',
            'password' => (string) bcrypt('irina')
        ]);
        $specialist->roles()->attach($specialistRole);

        $specialist = User::query()->create([
            'email' => 'specialist-elena@gmail.com',
            'password' => (string) bcrypt('elena')
        ]);
        $specialist->roles()->attach($specialistRole);

        $employer = User::query()->create([
            'email' => 'employer-oleg@gmail.com',
            'password' => (string) bcrypt('oleg')
        ]);
        $employer->roles()->attach($employerRole);
    }
}
