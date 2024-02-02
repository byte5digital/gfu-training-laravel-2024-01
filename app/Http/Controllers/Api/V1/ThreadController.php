<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Api\v1\StoreThreadRequest;
use App\Http\Resources\ThreadResource;
use App\Models\Board;
use App\Models\Thread;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class ThreadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    #[OA\Get(
        path: '/api/v1/threads',
        security: ['bearerAuth'],
        parameters: [
            new OA\Parameter(
                name: 'page',
                description: 'Page number to return.',
                example: 3,
            ),
        ],
        responses: [
            new OA\Response(
                response: '200',
                description: 'Returns paginated list of Threads',
                content: new OA\JsonContent(),
            ),
        ],
    )]
    public function index(): JsonResponse
    {
        $threads = Thread::paginate();
        return ThreadResource::collection($threads)
            ->response();
    }

    /**
     * Store a newly created resource in storage.
     */
    #[OA\Post(
        path: '/api/v1/threads',
        summary: 'Creates an new Thread and returns it.',
        security: ['bearerAuth'],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ['title', 'content'],
                properties: [
                    new OA\Property(
                        property: 'title',
                        type: 'string',
                        example: 'Hans wurst isst ein Ei!',
                    ),
                    new OA\Property(
                        property: 'content',
                        type: 'string',
                        example: 'Lorem ipsum dolor sit amet.',
                    ),
                    new OA\Property(
                        property: 'board_id',
                        type: 'integer',
                        example: 4,
                    ),
                ],
            ),
        ),
        responses: [
            new OA\Response(
                response: '200',
                description: 'Returns created Thread.',
                content: new OA\JsonContent(),
            ),
            new OA\Response(
                response: '500',
                description: 'Server Error.',
                content: new OA\JsonContent(),
            ),
        ],
    )]
    public function store(StoreThreadRequest $request): JsonResponse
    {
        $thread = new Thread($request->validated());
        $thread->user()->associate(auth()->user() ?? 1);
        $thread->board()->associate(Board::find($request->validated('board_id')));

        $thread->save();

        return (new ThreadResource($thread))
            ->response();
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
