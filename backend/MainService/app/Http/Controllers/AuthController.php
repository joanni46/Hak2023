<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\Auth\input\LoginDTO as InputLoginDTO;
use App\Transformers\User\UserTransformer;
use Illuminate\Auth\AuthManager;
use Illuminate\Http\JsonResponse;

final class AuthController extends Controller
{
    const TOKEN_TYPE = 'bearer';

    public function __construct(private readonly AuthManager $authentication) {}

    public function login(InputLoginDTO $dto): JsonResponse
    {
        $credentials = [
            'email' => $dto->email,
            'password' => $dto->password,
        ];

        if (! $token = auth()->attempt($credentials)) {
            return responder()->success(['error' => 'Unauthorized'])->respond(401);
        }

        return $this->respondWithToken($token);
    }

    public function me(): JsonResponse
    {
        return responder()
            ->success($this->authentication->user(), new UserTransformer())
            ->with(['profile'])
            ->respond();
    }

    public function logout(): JsonResponse
    {
        $this->authentication->logout();

        return responder()->success(['message' => 'Successfully logged out'])->respond();
    }

    public function refresh(): JsonResponse
    {
        return $this->respondWithToken($this->authentication->refresh());
    }

    protected function respondWithToken(string $token): JsonResponse
    {
        return responder()
            ->success([
                'access_token' => $token,
                'token_type' => self::TOKEN_TYPE,
                'expires_in' => $this->authentication->factory()->getTTL() * 60
            ])
            ->respond();
    }
}
