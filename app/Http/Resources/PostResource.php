<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'Post',
    description: 'Represents an Post ',
    properties: [
        new OA\Property(property: 'content', type: 'string', example: 'Lorem ipsum dolor sit amet.'),
        new OA\Property(property: 'created_at', type: 'datetime', example: '1972-01-01 12:34:56'),
        new OA\Property(property: 'updated_at', type: 'datetime', example: '1972-01-01 12:34:56'),
        new OA\Property(property: 'user', ref: '#/components/schemas/User'),
    ],
)]
class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'content'       => $this->content,
            'created_at'    => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at'    => $this->updated_at?->format('Y-m-d H:i:s'),
            'user'          => new UserResource(User::find($this->user_id)),
        ];
    }
}
