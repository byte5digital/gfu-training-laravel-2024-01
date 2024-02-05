<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Api\V1\AuthRequest;
use App\Http\Resources\UserResource;
use App\Models\PersonalAccessToken;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\Response;


class AuthController extends Controller
{
    /**
     * @param AuthRequest $request
     * @return mixed
     */
    #[OA\Post(
        path: "/api/v1/auth",
        requestBody: new OA\RequestBody(
            description: "The Token Request",
            required: true,
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(property: "email", type: "string", example: "your@email.com"),
                    new OA\Property(property: "password", type: "string", example: "YOUR_PASSWORD"),
                ]
            )
        ),
        responses: [
            new OA\Response(
                response: "200",
                description: "The created PersonalAccessToken",
            ),
        ],
    )]
    public function create(AuthRequest $request): JsonResponse
    {
        if ( ! Auth::attempt([
            'email' => $request->validated('email'),
            'password' => $request->validated('password'),
        ])) {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }

        $user = Auth::user();
        $tokenName = 'Token created via login on ' . Carbon::now();
        $token = $user->createToken($tokenName);

        /** @var PersonalAccessToken $accessToken */
        $accessToken = $token->accessToken;

        $result = collect([
            'user' => new UserResource($user),
            'authorization' => [
                'token' => $token->plainTextToken,
                'type' => 'bearer',
                'name' => $accessToken->name,
                'expires_at' => $accessToken->expires_at,
                'updated_at' => $accessToken->updated_at,
            ]
        ]);

        return $this->sendResponse($result, 'User login successfully.');
    }

}
