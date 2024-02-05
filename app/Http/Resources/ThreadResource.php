<?php

namespace App\Http\Resources;

use App\Models\Board;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'Thread',
    description: 'Represents an Thread with Posts and the creator',
    properties: [
        new OA\Property(property: 'title', type: 'string', example: 'Fresh news about something'),
        new OA\Property(property: 'slug', type: 'string', example: 'fresh-news-about-something'),
        new OA\Property(property: 'content', type: 'string', example: 'Lorem ipsum dolor sit amet.'),
        new OA\Property(property: 'created_at', type: 'datetime', example: '1972-01-01 12:34:56'),
        new OA\Property(property: 'updated_at', type: 'datetime', example: '1972-01-01 12:34:56'),
        new OA\Property(property: 'user', ref: '#/components/schemas/User'),
        new OA\Property(property: 'posts', ref: '#/components/schemas/Post'),
    ],
)]
class ThreadResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title'         => $this->title,
            'slug'          => $this->slug,
            'content'       => $this->content,
            'created_at'    => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at'    => $this->updated_at?->format('Y-m-d H:i:s'),
            'user'          => new UserResource(User::find($this->user_id)),
            'board'         => Board::find($this->board_id)->name,
            'posts'         => PostResource::collection($this->resource->posts),
        ];
    }
}
