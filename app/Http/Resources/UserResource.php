<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use OpenApi\Attributes as OA;

#[OA\Schema(
    schema: 'User',
    description: 'Represents an User with some statistic',
    properties: [
        new OA\Property(property: 'name', type: 'string', example: 'Hans Wurst'),
        new OA\Property(property: 'email', type: 'string', example: 'hans@wurst.org'),
        new OA\Property(property: 'verified', type: 'boolean', example: true),
        new OA\Property(property: 'created_at', type: 'datetime', example: '1972-01-01 12:34:56'),
        new OA\Property(property: 'updated_at', type: 'datetime', example: '1972-01-01 12:34:56'),
        new OA\Property(property: 'threadCount', type: 'integer', example: 13),
        new OA\Property(property: 'postCount', type: 'integer', example: 17),
    ],
)]
class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name'          => $this->name,
            'email'         => $this->email,
            'verified'      => $this->email_verified_at instanceof Carbon,
            'created_at'    => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at'    => $this->updated_at?->format('Y-m-d H:i:s'),
            'threadCount'   => $this->resource->threads()->count(),
            'postCount'     => $this->resource->posts()->count(),
        ];
    }
}
