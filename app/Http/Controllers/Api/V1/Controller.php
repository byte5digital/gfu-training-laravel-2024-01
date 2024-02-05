<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Http\JsonResponse;
use OpenApi\Attributes as OA;
use Symfony\Component\HttpFoundation\Response;

#[
    OA\Info(
        version: '1.0.0',
        description: 'API of the test project for the Laravel workshop at the GFU.',
        title: 'Test API',
        contact: new OA\Contact(
            name: 'Timo Paul',
            email: 'tpaul@byte5.de',
       ),
    ),
    OA\Server(
        url: 'http://localhost:80',
        description: 'local server',
    ),
    OA\SecurityScheme(
        securityScheme: 'bearerAuth',
        type: 'http',
        name: 'Authorization',
        in: 'header',
        scheme: 'bearer',
    ),
    OA\OpenApi(
        components: new OA\Components(
            schemas: [
                new OA\Schema(
                    schema: 'Error',
                    required: ['success', 'message'],
                    properties: [
                        new OA\Property(property: 'success', type: 'boolean', example: false),
                        new OA\Property(property: 'message', type: 'string', example: 'You got an error!'),
                    ],
                ),
            ],
        ),
    ),
]
class Controller extends BaseController
{
    /**
     * success response method.
     *
     * @param Jsonable $result
     * @param string|null $message
     * @return JsonResponse
     */
    protected function sendResponse(Jsonable $result, string|null $message = null): JsonResponse
    {
        $response = [
            'success' => true,
            'data'    => $result,
        ];

        if (null !== $message) {
            $response['message'] = $message;
        }

        return response()->json($response, 200);
    }


    /**
     * return error response.
     *
     * @param string $error
     * @param array $errorMessages
     * @param int $code
     * @return JsonResponse
     */
    protected function sendError(string $error, array $errorMessages = [], int $code = 404): JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if ( ! empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }

}
