<?php

namespace App\Transformers\Meeting;

use App\Models\Meeting\Meeting;
use App\Transformers\User\UserTransformer;
use Flugg\Responder\Transformers\Transformer;

final class MeetingTransformer extends Transformer
{
    protected $relations = [
        'specialist' => UserTransformer::class,
    ];

    public function transform(Meeting $meeting): array
    {
        return [
            'id' => $meeting->id,
            'title' => $meeting->title,
            'date_start' => $meeting->date_start->toIso8601String(),
            'status' => $meeting->status,
            'broadcast_link' => $meeting->broadcast_link,
        ];
    }
}
