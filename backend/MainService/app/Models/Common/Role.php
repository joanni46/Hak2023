<?php

namespace App\Models\Common;

use App\Models\User\User;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role as SpatieRole;

/**
 * App\Models\Common\Role
 *
 * Attributes.
 * @property int $id
 * @property string $name
 * @property string $guard_name
 * @property CarbonInterface $created_at
 * @property CarbonInterface $updated_at
 *
 * Relations.
 * @property-read Collection<int, Permission> $permissions
 * @property-read Collection<int, User> $users
 */
class Role extends SpatieRole
{
    use HasFactory;

    protected $fillable = ['name', 'guard_name'];

    public static function getTableName(): string
    {
        return with(new static)->getTable();
    }
}

