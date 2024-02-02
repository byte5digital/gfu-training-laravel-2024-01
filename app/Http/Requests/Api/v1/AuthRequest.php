<?php

namespace App\Http\Requests\Api\V1;

use App\Http\Requests\Traits\IsAuthRequest;
use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    use IsAuthRequest;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

}
