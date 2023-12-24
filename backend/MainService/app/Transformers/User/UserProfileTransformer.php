<?php

namespace App\Transformers\User;

use App\Models\User\User;
use App\Models\User\UserProfile;
use Flugg\Responder\Transformers\Transformer;

final class UserProfileTransformer extends Transformer
{
    public function transform(UserProfile $profile): array
    {
        return [
            'id' => $profile->id,
            'position' => $profile->position,
            'first_name' => $profile->first_name,
            'last_name' => $profile->last_name,
            'middle_name' => $profile->middle_name,
            'image' => $profile->image,
            'bio' => $profile->bio,
        ];
    }
}
