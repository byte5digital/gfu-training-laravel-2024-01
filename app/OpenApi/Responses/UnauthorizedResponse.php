<?php

namespace App\OpenApi\Responses;

use OpenApi\Attributes\Attachable;
use OpenApi\Attributes\JsonContent;
use OpenApi\Attributes\MediaType;
use OpenApi\Attributes\Response;
use OpenApi\Attributes\XmlContent;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;

class UnauthorizedResponse extends Response
{
    public function __construct(
        string|object|null $ref = null,
        ?array $headers = null,
        MediaType|JsonContent|XmlContent|Attachable|array|null $content = null,
        ?array $links = null,
        // annotation
        ?array $x = null,
        ?array $attachables = null
    )
    {
        parent::__construct(
            ref: $ref,
            response: SymfonyResponse::HTTP_UNAUTHORIZED,
            description: 'Unauthorized',
            headers: $headers,
            content: new JsonContent(),
            links: $links,
            x: $x,
            attachables: $attachables,
        );
    }

}
