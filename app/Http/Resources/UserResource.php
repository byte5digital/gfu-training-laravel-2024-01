<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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
            'updated_at'    => $this->updated_at->format('Y-m-d H:i:s'),
            'threadCount'   => $this->resource->threads()->count(),
            'postCount'     => $this->resource->posts()->count(),
        ];
    }
}
