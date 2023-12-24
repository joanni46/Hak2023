<?php

namespace Database\Seeders\Common;

use App\Models\Common\Role;
use Illuminate\Database\Seeder;

final class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = config('seeders.roles');

        foreach ($roles as $role) {
            Role::query()->updateOrCreate($role, $role);
        }
    }
}
