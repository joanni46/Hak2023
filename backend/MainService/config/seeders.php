<?php

use App\Enums\RoleEnum;

return [
    'roles' => [
        [
            'name' => RoleEnum::Admin->value,
            'display_name' => 'Администратор',
        ],
        [
            'name' => RoleEnum::Specialist->value,
            'display_name' => 'Специалист',
        ],
        [
            'name' => RoleEnum::Employer->value,
            'display_name' => 'Работник',
        ],
    ],
];

