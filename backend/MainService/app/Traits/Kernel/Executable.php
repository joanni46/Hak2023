<?php

namespace App\Traits\Kernel;

/*
 * For execute without DI
 */
trait Executable
{
    public static function make(): static
    {
        return app(static::class);
    }

    public static function run(mixed ...$arguments): mixed
    {
        return static::make()->execute(...$arguments);
    }
}
