<?php

namespace App\Models\Meeting;

use App\Abstract\Model\BaseModel;
use App\Models\User\User;
use Carbon\CarbonInterface;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
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
 * @property-read User $specialist
 */
class Meeting extends BaseModel
{
    use HasFactory;
    use Filterable;

    protected $table = 'meetings';

    protected $fillable = [
      'title',
      'date_start',
      'status',
      'broadcast_link',
    ];

    protected $casts = [
        'date_start' => 'datetime',
    ];

    public function specialist(): BelongsTo
    {
        return $this->belongsTo(User::class, 'specialist_id', 'id');
    }
}
