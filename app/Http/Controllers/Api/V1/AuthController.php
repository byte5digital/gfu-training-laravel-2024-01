<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Api\V1\AuthRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use OpenApi\Attributes as OA;

class AuthController extends Controller
{
    /**
     * @return JsonResponse
     */
    #[OA\Post(
        path: '/api/v1/auth',
        requestBody: new OA\RequestBody(
            description: 'The Token request',
            required: true,
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(
                        property: 'email',
                        type: 'string',
                        example: 'john@doe.com',
                    ),
                    new OA\Property(
                        property: 'password',
                        type: 'string',
                        example: 'YourSecret',
                    )
                ],
            ),
        ),
        responses: [
            new OA\Response(
                response: 200,
                description: 'The created PersonalAccessToken.'
            )
        ],
    )]
    public function create(AuthRequest $request): JsonResponse
    {
        if ( ! Auth::attempt($request->validated())) {
            return response()->json(['error' => 'Unauthorized.'], 404);
        }

        /** @var User $user */
        $user = auth()->user();
        $tokenName = 'Token created via login on ' . Carbon::now();
        $token = $user->createToken($tokenName);

        $result = collect([
            'user' => new UserResource($user),
            'authorization' => [
                'token' => $token->plainTextToken,
                'type' => 'bearer',
                'name' => $token->accessToken->name,
                'expires_at' => $token->accessToken->expires_at,
                'updated_at' => $token->accessToken->updated_at,
            ],
        ]);

        return response()->json($result);
    }
}
