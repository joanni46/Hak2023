<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\UserProfile
 *
 * Attributes.
 * @property int $id
 * @property int $user_id
 * @property string $position
 * @property string $last_name
 * @property string $middle_name
 * @property string image
 * @property string $bio
 *
 * Relations.
 * @property User $user
 *
 */
class UserProfile extends Model
{
    use HasFactory;

    protected $table = 'user_profiles';

    protected $fillable = [
      'position',
      'last_name',
      'first_name',
      'middle_name',
      'image',
      'bio',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
