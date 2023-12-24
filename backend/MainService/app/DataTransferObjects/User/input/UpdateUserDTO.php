<?php

namespace App\DataTransferObjects\User\input;

use Spatie\LaravelData\Data;

final class UpdateUserDTO extends Data
{
    public function __construct(
        public ?string $email,
        public ?string $password,
        public ?string $position,
        public ?string $first_name,
        public ?string $last_name,
        public ?string $middle_name,
        public ?string $image,
        public ?string $bio,
    ) {}
}
