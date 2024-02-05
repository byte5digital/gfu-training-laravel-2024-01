<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\OpenApi\Responses\UnauthorizedResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * Display a listing of users.
     */
    #[OA\Get(
        path: "/api/v1/users",
        summary: 'Returns a listing of users.',
        security: [['bearerAuth' => []]],
        responses: [
            new OA\Response(
                response: "200",
                description: "Returns List of `User`s",
                content: new OA\JsonContent(),
            ),
            new UnauthorizedResponse(ref: '#/components/schemas/Error'),
            new OA\Response(
                ref: '#/components/schemas/Error',
                response: Response::HTTP_NOT_FOUND,
                description: 'Not Found',
                content: new OA\JsonContent(),
            ),
            new OA\Response(
                ref: '#/components/schemas/Error',
                response: Response::HTTP_INTERNAL_SERVER_ERROR,
                description: 'Server Error',
                content: new OA\JsonContent(),
            ),
        ],
    )]
    public function index(): JsonResponse
    {
        $user = User::paginate();
        return UserResource::collection($user)
            ->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    #[OA\Post(
        path: "/api/v1/users",
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
                description: "The created `User`",
            ),
        ],
    )]
    public function store(StoreUserRequest $request)
    {
        $user = (new User($request->validated()))
            ->save();

        return (new UserResource($user))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
