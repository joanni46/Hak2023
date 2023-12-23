<?php

namespace App\Transformers\User;

use App\Models\User\User;
use Flugg\Responder\Transformers\Transformer;

final class UserTransformer extends Transformer
{
    protected $relations = [
        'profile' => UserProfileTransformer::class,
    ];

    public function transform(User $user): array
    {
        return [
            'id' => $user->id,
            'email' => $user->email,
        ];
    }
}
