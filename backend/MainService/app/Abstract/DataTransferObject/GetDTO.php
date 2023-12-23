<?php

namespace App\Abstract\DataTransferObject;

use App\Enums\SortDirectionEnum;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Validation\ValidationContext;

abstract class GetDTO extends Data
{
    public int $page = 1;

    public int $perPage = 15;

    public bool $paginate = true;

    public array $filter = [];

    public array $sort = [];

    public static function rules(ValidationContext $context): array
    {
        return [
            'page' => ['nullable', 'integer', 'min:1'],
            'perPage' => ['nullable', 'integer', 'min:1'],
            'paginate' => ['nullable', 'boolean'],
            'filter' => ['nullable', 'array'],
            'sort' => ['nullable', 'array'],
            'sort.*' => ['nullable', Rule::enum(SortDirectionEnum::class)]
        ];
    }
}
