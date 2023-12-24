<?php

namespace App\Enums;

enum RoleEnum: string
{
    case Admin = 'admin';
    case Specialist = 'specialist';
    case Employer = 'employer';
}
