<?php

namespace App\Http\Requests\Api\V1;

use App\Http\Requests\Traits\IsThreadRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreThreadRequest extends FormRequest
{
    use IsThreadRequest;

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

}
