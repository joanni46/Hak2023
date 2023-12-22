<?php

namespace App\Models\Meeting;

use App\Models\User\User;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Meeting\Meeting
 *
 * Attributes.
 * @property int $id
 * @property string $title
 * @property CarbonInterface $date_start
 * @property int $specialist_id
 * @property string $status
 * @property string $broadcast_link
 *
 * Relations.
 *
 */
class Meeting extends Model
{
    use HasFactory;

    protected $table = 'meetings';

    protected $fillable = [
      'title',
      'date_start',
      'status',
      'broadcast_link',
    ];

    public function specialist(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
